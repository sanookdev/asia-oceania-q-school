<?
  session_start();
  if( !isset( $_SESSION['user'])) {
        echo "AccessDenied";
        header("Location: ./login.php");
  }else{
    header("Location: ./main.php");
  }
?>