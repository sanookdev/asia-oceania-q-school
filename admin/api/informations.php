<?
header("Content-type: application/json; charset=utf-8");

$_POST = json_decode(file_get_contents("php://input"),true);

require('./services.php');

$service = new DB_con();

$result = array();

if($_POST['action'] == 'checkLogin'){
    $data = $_POST['data'];
    $username = strtoupper($data['username']);
    $password = $data['password'];

    $res = $service->checkAdmin();
    if($username == "ADMIN" && $password == $res['data']['password']){
        session_start();
        $_SESSION = $res['data'];
        $_SESSION['user'] = $_SESSION['username'];
        unset($_SESSION['password']);
        unset($_SESSION['username']);
        $result['message'] = "Login Successful";
        $result['status'] = true;
    }else{
        $result['message'] = "Username or Password is invalid";
        $result['status'] = false;
    }
}

else if($_POST['action'] == 'listRegister'){
    $query = $service->listRegister();
    $result = $query;
}
// completed

else if($_POST['action'] == 'deleteData'){
    $personal_id = $_POST['personal_id'];
    $query = $service->deleteData($personal_id);
    $result = $query;
    if($query['status']){
        $dir = '../../uploads/profiles/' . $personal_id;
        if (is_dir($dir)) {
            $objects = scandir($dir);
            $result = $objects;
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir") 
                        rrmdir($dir."/".$object); 
                    else unlink   ($dir."/".$object);
                }
            }
            reset($objects);
            rmdir($dir);
            $result = $query;
        }
    }
}

else if ($_POST['action'] == 'register'){
    $data = $_POST['data'];
    $table = "info_personal";
    $result = $service->register($data , $table);
}
// completed

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
    // $result = glob($imagesDir . '*.{jpg,jpeg,png,gif,pdf,JPG}', GLOB_BRACE);
    // echo json_encode(glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE));
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