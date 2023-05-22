<?
  session_start();
  if( !isset( $_SESSION['user']) && $_SESSION['user'] != "ADMIN") {
        echo "AccessDenied";
    header("Location: ./login.php");

  }else{
    header("Location: ./main.php");
  }
?>