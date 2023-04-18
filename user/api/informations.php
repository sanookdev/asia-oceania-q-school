<?
header("Content-type: application/json; charset=utf-8");

$_POST = json_decode(file_get_contents("php://input"),true);

require('./services.php');

$service = new DB_con();

$result = array();

if($_POST['action'] == 'checkLogin'){
    $data = $_POST['data'];
    $username  = strtoupper(trim($_POST['data']['username']));
    $password = md5($_POST['data']['password']);
    $checkData = $service->checkUserLogin($username);


    $idcard = (isset($checkData['idcard'])) ? md5($checkData['idcard']) : '';
    $passportNo = (isset($checkData['passportNo'])) ? md5($checkData['passportNo']) : '';


    if($password == $idcard || $password == $passportNo){
        session_start();
        $_SESSION['user'] = $username;
        $_SESSION['personal_id'] = $checkData['id'];
        $_SESSION['firstname'] = $checkData['prefix'].$checkData['firstname'];
        // $result['user'] = $username;
        // $result['personal_id'] = $checkData['id'];
        // $result['firstname'] = $checkData['prefix'].$checkData['firstname'];
        $result['message'] = "Login Successful";
        $result['status'] = true;
    }else{
        $result['message'] = "Username or Password is invalid";
        $result['status'] = false;
    }

}

else if($_POST['action'] == 'myRegister'){
    $personal_id = $_POST['personal_id'];
    $query = $service->myRegister($personal_id);
    $result = $query;
}
// completed

else if ($_POST['action'] == 'register'){
    $data = $_POST['data'];
    $table = "info_personal";
    $result = $service->register($data , $table);
}
// completed

else if ($_POST['action'] == 'updateProfile'){
    $data = $_POST['data'];
    $table = 'info_personal';
    $personal_id = $_POST['personal_id'];
    $result = $service->updateProfile($data,$table,$personal_id);
}

else if ($_POST['action'] == 'checkDuplicateUser'){
    $email = $_POST['email'];
    if($service->checkDuplicateEmail($email)){
        $result['message'] = "You can use this email.";
        $result['status'] = true;
    }else{
        $result['message'] = "This email is already in the system.";
        $result['status'] = false;
    }
}
// completed

else if($_POST['action'] == 'listPhoto'){
    $personal_id = $_POST['personal_id'];
    $imagesDir = '../../uploads/profiles/'.$personal_id.'/';
    $result = glob($imagesDir . '*.*', GLOB_BRACE);
    // $result = glob($imagesDir . '*.{jpg,jpeg,png,gif,pdf}', GLOB_BRACE);
}

else if ($_POST['action'] == 'userLogout'){
    $username = $_POST['username'];
    $query = $service->logout($username);
    if($query['status']){
        session_start();
        session_destroy();
        $result=$query;
    }else{
        $result['message'] = 'ไม่สามารถออกจากระบบได้ โปรดลองใหม่อีกครั้ง';
        $result['status'] = false;
    }
}

echo json_encode($result);
?>