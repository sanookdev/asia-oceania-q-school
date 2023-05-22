<?
header("Content-type: application/json; charset=utf-8");

$_POST = json_decode(file_get_contents("php://input"),true);

require('./services.php');

$service = new DB_con();

$result = array();


if ($_POST['action'] == 'register'){
    $data = $_POST['data'];
    $table = "info_personal";
    $result = $service->register($data , $table);
    if($result['status']){
        $result['personal_id'] = $service->getPersonalId($data['email']);
        $storageFolder = '../uploads/profiles/'.$result['personal_id'];
        if (!file_exists($storageFolder)) {
            mkdir($storageFolder ,0777,true);
        }
    }
}
// completed

else if ($_POST['action'] == 'checkDuplicateEmail'){
    $email = trim($_POST['email']);
    if(!$service->checkDuplicateEmail($email)){
        $result['message'] = "You can use this email.";
        $result['status'] = true;
        $result['email'] = $email;
    }else{
        $result['message'] = "This email is already in the system.";
        $result['status'] = false;
        $result['email'] = $email;

    }
}
// completed

else if ($_POST['action'] == 'uploadSingleFile'){
    $data_arr = $_POST['data_array'];
    if(count($data_arr) > 0){
        
    }
    $result = $data_arr;
}


echo json_encode($result);
?>