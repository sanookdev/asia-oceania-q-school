<?php
session_start();

isset($_REQUEST['projectId']) || die("no projectId");
isset($_SESSION['userId']) || die("no userId");

require_once "../../config/dbconnect.php";

$projectId = $_REQUEST['projectId'];
$userId = $_SESSION['userId'];

$revision = 'current';
if (isset($_REQUEST['revision'])) {
    $revision =  $_REQUEST['revision'];
}


$ds = DIRECTORY_SEPARATOR;


// define absolute folder path
$storeFolder = $uploadFolder . $ds . $projectId . $ds . $revision;

// delete file
if ($_POST['action'] == 'delete') {

    $targetFile =  $storeFolder . $ds . $_POST['filename'];
    if (unlink($targetFile)) {
        echo $targetFile;
        deleteDocument($dbcon, $_POST['docId']);
    } else {
        echo '0';
    }

    exit();
}

// download file
if ($_POST['action'] == 'download') {

    $docId = $_POST['docId'];
    $query = "UPDATE wf_document set isDownload = '1' WHERE docId = '$docId' and userId <> '$userId'";
    if (mysqli_query($dbcon, $query)) {
        echo 'Update complete';
    } else {
        echo '0';
    }

    exit();
}

// rename file
if ($_GET['action'] == 'rename') {

    $docId = $_POST['pk'];
    $oldName = $_POST['name'];
    $newName = $_POST['value'];

    $sourceFile = $storeFolder . $ds . $oldName;
    $targetFile =  $storeFolder . $ds . $newName;

    renameDocument($dbcon, $docId, $newName, $sourceFile, $targetFile);

    exit();
}

// change type
if ($_GET['action'] == 'changetype') {

    $docId = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];
    changeDocType($dbcon, $docId, $value);
    exit();
}


// if folder doesn't exists, create it
if (!file_exists($storeFolder) && !is_dir($storeFolder)) {
    mkdir($storeFolder, 0777, true);
}

// upload files to $storeFolder 
if (!empty($_FILES) && isset($_REQUEST['docTypeId'])) {

    $docTypeId = $_REQUEST['docTypeId'];

    if ($docTypeId == 0) {
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "Unable to upload file: No docTypeId";
        exit();
    }

    foreach ($_FILES['file']['tmp_name'] as $key => $value) {       

        $tempFile = $_FILES['file']['tmp_name'][$key];
        $fileName = $_FILES['file']['name'][$key];
        $targetFile =  $storeFolder . $ds . $fileName;

        if (move_uploaded_file( $tempFile , $targetFile)) {
            if (isFileExist($dbcon, $projectId, $fileName)) {
                updateDocument($dbcon, $projectId, $docTypeId, $fileName, $userId);
            } else {
                insertDocument($dbcon, $projectId, $docTypeId, $fileName, $userId);
            }
        } else {
            header('HTTP/1.0 400 Bad Request', true, 400);
            echo "Unable to upload file: $fileName";
        }
    }
} else {
    $result = array();
    $documents = listDocument($dbcon, $projectId);

    $isSecretary = isProjectSecretary($dbcon, $projectId, $userId);
    $isReviewer = isProjectReviewer($dbcon, $projectId, $userId);
    $isResearcher = isProjectResearcher($dbcon, $projectId, $userId);

    $_SESSION['roleId'] == 1 ? $isAdmin = true : $isAdmin = false;

    if (!($isAdmin || $isResearcher || $isSecretary || $isReviewer)) exit();
    foreach ($documents as $document) {
        $file = $document['fileName'];
        $docId = $document['docId'];
        $docTypeId = $document['docTypeId'];
        $docTypeName = $document['docTypeName'];
        $docResearcher = $document['researcher'];
        $docSecretary = $document['secretary'];
        $docReviewer = $document['reviewer'];
        $uploadDate = $document['uploadDate'];

        //edit 2
        $file1 = $document['fileName'];
        $url = './uploads/' . $projectId . '/' . $revision . '/' . $file1;
        $icon = '<i class="far fa-file mr-1"></i>';

        // Block researcher document
        if ($document['researcher'] == 0 && $isResearcher) continue;

        // Block reviewer document
        if ($document['reviewer'] == 0 && $isReviewer) continue;
        $typeEdit = '';
        $canFileRenameClass = '';
        $canDeleteFile = false;
        if ($isAdmin) {
            $typeEdit = 'doc-type ';
            $canFileRenameClass = 'file-rename ';
            $canDeleteFile = true;
        }
        // Allow editing document
        if ($_SESSION['roleId'] == $_GET['assignRoleId']) {
            if ($isSecretary && $docSecretary == 2) {
                $canFileRenameClass = 'file-rename ';
                $canDeleteFile = true;
            }
            if ($isResearcher && $docResearcher == 2) {
                $canFileRenameClass = 'file-rename ';
                $canDeleteFile = true;
            }
        }

        // reviewer permision
        if ($isReviewer && $docReviewer == 2) {
            $canFileRenameClass = 'file-rename ';
            $canDeleteFile = true;
        }

        if ($docResearcher == 0) {
            $redLink = 'style="color:#FF0000;"';
        } else {
            $redLink = '';
        }

        if (file_exists($storeFolder . $ds . $file)) {
            $fileM = $file1;
            $fileMix = $storeFolder . $ds .$fileM;
            $fileTime = filemtime($fileMix);
            $strYear = date("Y", $fileTime) + 543;
            $strMonth = date("m", $fileTime);
            $strDay = date("d", $fileTime);
            $strHour = date("H", $fileTime);
            $strMinute = date("i", $fileTime);

            if ($document['isDownload'] == 0) {
                $isDownload = 'font-weight-bold';
                $obj['DT_RowClass'] = '';
            } else {
                $isDownload = '';
                $obj['DT_RowClass'] = 'bg-secondary';
            }

            $obj['user'] = '<div class="' . $isDownload . '">' . $document['firstname'] . ' ' . $document['lastname'] . '</div>';
            $obj['type'] = '<a href="#" class="' . $typeEdit . ' ' . $isDownload . '" data-name="doctype" data-type="select" data-pk="' . $docId . '">' . $docTypeName . '</a>';
            $obj['name'] = '<a href="#" class="' . $canFileRenameClass  . $isDownload . '" data-name="' . $file1 . '" data-type="text" data-pk="' . $docId . '" ' . $redLink . '>' . $file1 . '</a>';
            $obj['size'] = filesize($storeFolder . $ds . $file);
            $obj['time'] = '<div class="' . $isDownload . '">'.$uploadDate.'</div>';
            $btDownload  = '<a class="download mr-1" target="_blank" href="' . $url . '">
                                <i class="fas fa-file-download" data-toggle="tooltip" title="Download"></i></a>';
            $btDownload = '<button class="close btn-download mr-1" data-url="' . $url . '" data-project-id="' . $projectId . '" data-doc-id="' . $docId . '">
                                <i class="fas fa-file-download" data-toggle="tooltip" title="Download"></i></button>';

            if ($canDeleteFile) {
                $btDelete = '<button class="close btn-delete" data-filename="' . $file1 . '" data-project-id="' . $projectId . '" data-doc-id="' . $docId . '">
                                  <i class="far  fa-trash-alt" data-toggle="tooltip" title="Delete"></i></button>';
            } else {
                $btDelete = '';
            }

            if ($_GET['action'] == 'd-none') $btDelete = '';

            $obj['button'] = '<div align="right" class="d-flex flex-nowrap">' . $btDownload . $btDelete . '</div>';
            $result[] = $obj;
        }
    }

    $json['data'] = $result;
    header('Content-type: text/json');
    header('Content-type: application/json');
    echo json_encode($json);
}
exit();

function insertDocument($dbcon, $projectId, $docTypeId, $fileName, $userId)
{
    $query = "INSERT into wf_document (projectId,docTypeId,fileName,userId)
    VALUES ('$projectId','$docTypeId','$fileName','$userId')";
    mysqli_query($dbcon, $query) or die('insertDocument() : ' . mysqli_error($dbcon));
}

function isFileExist($dbcon, $projectId, $fileName)
{
    $query = "SELECT * FROM wf_document where projectId='$projectId' and fileName='$fileName'";
    mysqli_set_charset($dbcon,"utf8");
    $res = mysqli_query($dbcon, $query) or die('isFileExist() : ' . mysqli_error($dbcon));

    if (mysqli_num_rows($res) > 0) return true;

    return false;
}

function changeDocType($dbcon, $docId, $docTypeId)
{
    $query = "UPDATE wf_document 
              SET docTypeId='$docTypeId' 
              WHERE docId='$docId'";
    mysqli_query($dbcon, $query) or die('changeDocType() : ' . mysqli_error($dbcon));
}

function updateDocument($dbcon, $projectId, $docTypeId, $fileName, $userId)
{
    $query = "UPDATE wf_document 
              SET userId='$userId', isDownload=0  
              WHERE projectId='$projectId' and fileName='$fileName'";
    mysqli_query($dbcon, $query) or die('updateDocument() : ' . mysqli_error($dbcon));
}

function renameDocument($dbcon, $docId, $fileName, $sourceFile, $targetFile)
{
    if (rename($sourceFile, $targetFile)) {
        echo $targetFile;
        $query = "UPDATE wf_document 
              SET fileName='$fileName' 
              WHERE docId='$docId'";
        mysqli_query($dbcon, $query) or die('renameDocument() : ' . mysqli_error($dbcon));
    } else {
        header('HTTP/1.0 400 Bad Request', true, 400);
        echo "This field is required!";
    }
}

function listDocument($dbcon, $projectId)
{
    $query = "SELECT *, wf_document.docTypeId as docTypeId 
            FROM wf_document,wf_doctype,wf_user 
            WHERE wf_document.docTypeId = wf_doctype.docTypeId
            and wf_document.userId = wf_user.userId 
            and projectId='$projectId'";

    $res = mysqli_query($dbcon, $query) or die('listDocument() : ' . mysqli_error($dbcon));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function deleteDocument($dbcon, $docId)
{
    $query = "DELETE FROM wf_document WHERE docId='$docId'";
    mysqli_query($dbcon, $query) or die('deleteDocument() : ' . mysqli_error($dbcon));
}

function isProjectReviewer($dbcon, $projectId, $userId)
{
    $query = "SELECT * 
            FROM wf_reviewer 
            WHERE projectId='$projectId' 
            and revUserId='$userId' 
            and isConfirm = 'Y' ";
    $res = mysqli_query($dbcon, $query) or die('isProjectReviewer() : ' . mysqli_error($dbcon));

    if (mysqli_num_rows($res) > 0) return true;

    return false;
}

function isProjectSecretary($dbcon, $projectId, $userId)
{
    $query = "SELECT * 
            FROM wf_project 
            WHERE projectId='$projectId' 
            and (secretaryId='$userId' or presidentId='$userId')
            ";
    $res = mysqli_query($dbcon, $query) or die('isProjectSecretary() : ' . mysqli_error($dbcon));

    if (mysqli_num_rows($res) > 0) return true;

    return false;
}

function isProjectResearcher($dbcon, $projectId, $userId)
{
    $query = "SELECT * 
            FROM wf_project 
            WHERE projectId='$projectId' 
            and researcherId='$userId' 
            ";
    $res = mysqli_query($dbcon, $query) or die('isProjectResearcher() : ' . mysqli_error($dbcon));

    if (mysqli_num_rows($res) > 0) return true;

    return false;
}