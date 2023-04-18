<?
include "../../config/userpassDB.php";
class DB_con{
    function __construct(){
        $conn = new mysqli(HOSTDB,USERDB,PASSDB,NAMEDB);
        $this->dbcon = $conn;
        mysqli_set_charset($this->dbcon,"utf8");
        if ($this->dbcon -> connect_errno) {
            echo "Failed to connect to MySQL: " . $this->dbcon -> connect_error;
            exit();
          }
    }
    

    public function checkAdmin(){
        $sql = "SELECT * FROM users WHERE username = 'ADMIN' LIMIT 1";
        $query = $this->dbcon->query($sql);
        $return = array();
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['status'] = true;
            if($query->num_rows > 0){
                $return['message'] = "success";
                $return['status'] = true;
                $return['data'] = $query->fetch_assoc();
            }else{
                $return['message'] = 'nodata';
            }
        }
        return $return;
    }
    // completed
    public function listRegister(){
        $sql = "SELECT * FROM info_personal ORDER BY id ASC";
        $query = $this->dbcon->query($sql);
        $return = array();
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['status'] = true;
            if($query->num_rows > 0){
                $return['message'] = 'success';
                while ($row = $query ->fetch_assoc()){
                    $return['data'][] = $row;
                }
            }else{
                $return['message'] = 'nodata';
            }
        }
        return $return;
    }

    public function deleteData($personal_id){
        $sql = "DELETE FROM info_personal WHERE id = '$personal_id'";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
        }
        return $return;
    }

    // completed
    public function listAccountAll(){
        $sql = "SELECT * FROM users";
        $query = $this->dbcon->query($sql);
        $return = array();
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
            if($query->num_rows > 0){
                while ($row = $query -> fetch_assoc()){
                    $return['data'][] = $row;
                }
            }
        }
        return $return;
    }
    public function listProjectExpire(){
        $sql = "SELECT * FROM projects WHERE projectNotificationExpire > NOW()";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
            if($query->num_rows > 0){
                while ($row = $query -> fetch_assoc()){
                    $return['data'][] = $row;
                }
            }
        }
        return $return;
    }
    public function listProjectAwaitingApproval(){
        $sql = "SELECT * FROM projects WHERE projectStatus = '0'";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
            if($query->num_rows > 0){
                while ($row = $query -> fetch_assoc()){
                    $return['data'][] = $row;
                }
            }
        }
        return $return;
    }

    public function viewRegister($personal_id){
        $sql = "SELECT * FROM info_personal WHERE id = '$personal_id'";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
            if($query->num_rows > 0){
                while ($row = $query -> fetch_assoc()){
                    $return['data'][] = $row;
                }
            }
        }
        return $return;
    }

    // completed
    public function checkDuplicateEmail($email){
        $sql = "SELECT * FROM info_personal WHERE email = '$email'";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $error = "Error description: " . $this->dbcon->error;
            return $error;
        }else{
            if($query->num_rows > 0){
                return false;
            }else{
                return true;
            }
        }
    }

    // completed
    public function register($data, $table){
        $keys = '';
        $values = '';
        $lastData = count($data);
        $i = 0 ;
        foreach ($data as $key => $value) {
            $keys .= '`'.$key.'`';
            $values .= "'".$value."'";
            if(++$i != $lastData) {
                $keys .= ',';
                $values .= ',';
            }
        }
        $table = $table .'(' . $keys . ')';
        $sql = "INSERT INTO $table VALUES(".$values.")";
        $query = $this->dbcon->query($sql);
        $return = array();
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['dataQuery'] = $query;
            $return['status'] = true;
        }
        return $return;
    }

    // completed
    public function createUser($username,$password){
        $sql = "INSERT INTO users(`userName`,`userPassword`) VALUES('$username' , '$password')";
        $query = $this->dbcon->query($sql);
        $return = array();
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'Account Created';
            $return['status'] = true;
        }
        return $return;
    }
    public function updateProject($projectId,$newData){

    }
    public function uploadFile(){

    }
    public function deleteFile(){

    }
    public function updateFile(){
        
    }
    public function countListProject($title){
        $sql = "SELECT COUNT(*) AS count FROM projects";
        if($title == 'listProjectAwaitingApproval'){
            $sql .= " WHERE projectStatus = 0";
        }
        else if ($title == 'listProjectExpire'){
            $sql .= " WHERE projectDateEnd > NOW()";
        }
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['sql'] = $sql;
            $return['status'] = true;
            $fetch = $query->fetch_assoc();
            $return['count'] = $fetch['count'];
        }
        return $return;
    }
    public function logout($userName){
        $sql = "INSERT INTO users_log(`userName`,`status`) VALUES('$userName','0')";
        $query = $this->dbcon->query($sql);
        if (!$query) {
            $return['message'] = "Error description: " . $this->dbcon->error;
            $return['status'] = false;
        }else{
            $return['message'] = 'success';
            $return['status'] = true;
        }
        return $return;
    }
}

?>