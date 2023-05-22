<?
$projectId = isset($_POST['projectId']) ? $_POST['projectId'] : '1';
$uploadFolder = 'C:\xampp\htdocs\research_app\uploads';
$ds = DIRECTORY_SEPARATOR;
$storeFolder = $uploadFolder .$ds . 'projectId' . $ds . $projectId . $ds;
$tmp = explode('.',$_FILES['fileInput']['name']);
$extension = end($tmp); 
$file = $_FILES['fileInput']['tmp_name'];
$allowed_extension = array("xlsx","xls","csv"); 
require_once("../plugins/PHPExcel/Classes/PHPExcel.php"); 
require_once("../plugins/PHPExcel/Classes/PHPExcel/IOFactory.php"); 

if (in_array($extension, $allowed_extension)) {
    $data_arr = array();
    $inputFileType = PHPExcel_IOFactory::identify($file);  
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
    $objReader->setReadDataOnly(true);  
    $objPHPExcel = $objReader->load($file); 
    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
    $highestRow = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();

    $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
    $headingsArray = $headingsArray[1];

    $r = -1;
    for ($row = 2; $row <= $highestRow; ++$row) {
        $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
        if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
            ++$r;
            foreach($headingsArray as $columnKey => $columnHeading) {
                $data_arr[$r][$columnHeading] = $dataRow[$row][$columnKey];
            }
        }
    }
}
?>
<? if(isset($data_arr)){?>
<!-- function uploadFile for button click live in location ./admin/js/uploadSingleFile.js -->
<table id="report_table" class="table table-bordered table-hover table-responsive text-center">
    <button class="btn btn-outline-success btn-sm btn_upload mb-2" name="btn_upload"
        onclick="uploadDataFile(<?= htmlspecialchars(json_encode($data_arr));?>,$(this))">Upload
        Data</button>
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อโครงการภาษาไทย</th>
            <th>ชื่อโครงการภาษาอังกฤษ</th>
            <th>ประเภทสังกัด</th>
            <th>หัวหน้าโครงการ</th>
            <th>ที่ปรึกษา</th>
            <th>ผู้ร่วมวิจัย</th>
            <th>วันที่ยื่นขอ</th>
            <th>วันที่อนุมัติ</th>
            <th>หนังสือรับรองเลขที่</th>
            <th>รหัสโครงการ</th>
            <th>ชนิด/ประเภทโครงการ</th>
            <th>ระดับความปลอดภัยของห้อง Lab</th>
            <th>ห้อง</th>
            <th>วันที่สิ้นสุดการรับรอง/กำหนดรายงานความก้าวหน้า</th>
            <th>วันที่อนุมัติขยายเวลารับรองโครงการ</th>
            <th>วันที่สิ้นสุดอายุุขยายเวลา</th>
            <th>วันที่อนุมัติปิดโครงการ</th>
        </tr>
    </thead>
    <tbody>
        <?
            foreach($data_arr as $results){
                echo "<tr>";
                foreach($results as $key => $val){
                echo "<td>" . $val . "</td>";
                }
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?}?>