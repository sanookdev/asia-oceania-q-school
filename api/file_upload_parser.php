<?php
$keyIndex = '';
foreach($_FILES as $key=>$value) {
    $keyIndex = $key;
}
$storageFolder = '../uploads/profiles/'.$_POST['personal_id'];
if (!file_exists($storageFolder)) {
    mkdir($storageFolder ,0777,true);
}
$fileName = $_FILES[$keyIndex]["name"]; // The file name
$type = explode('.',$fileName);
$type = '.' .end($type);
$fileTmpLoc = $_FILES[$keyIndex]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES[$keyIndex]["type"]; // The type of file it is
$fileSize = $_FILES[$keyIndex]["size"]; // File size in bytes
$fileErrorMsg = $_FILES[$keyIndex]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if (move_uploaded_file($fileTmpLoc, $storageFolder.'/'.$_POST['reName'].$type)) {
    echo "1";
} else {
    echo "move_uploaded_file function failed";
}

?>