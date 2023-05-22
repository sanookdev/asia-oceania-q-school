<?
include "../config/userpassDB.php";

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


    public function insertNameFileupload($personal_id,$filename,$filenameServer){
        $sql = "INSERT INTO documents(personal_id,filename,filenameServer) VALUE('$personal_id',$filename,$filenameServer)";
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

    public function checkDuplicateEmail($email){
        $sql = "SELECT * FROM info_personal WHERE email = '$email' LIMIT 1";
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
            $return['status'] = true;
        }
        return $return;
    }

    public function getPersonalId($email){
        $email = trim($email);
        $sql = "SELECT id FROM info_personal WHERE email = '$email' ORDER BY id DESC LIMIT 1";
        $query = $this->dbcon->query($sql);
        if($query->num_rows > 0){
            $fetch = $query->fetch_assoc();
            $return = $fetch['id'];
        }else{
            $return = 'Personal Id Not Found';
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
    //completed
}

?>