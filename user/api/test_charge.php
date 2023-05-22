<?
  require_once '../omise-php/lib/Omise.php'; // เรียกใช้ไฟล์ Omise.php ของ Omise API
  require_once "./services.php";

  define('OMISE_API_VERSION', '2015-11-17');
  define('OMISE_PUBLIC_KEY', 'pkey_test_5vhvxzw47q7827bebv4');
  define('OMISE_SECRET_KEY', 'skey_test_5vhvxzy1rep2z1l8k4y');
  
  session_start();

  if(isset($_SESSION['user']) && $_SESSION['user'] != "ADMIN"){
    echo "You dont have permission.";
    print_r($_SESSION);
    exit();
}

//   $id = $_SESSION['personal_id'];

//   $services = new DB_con();

  $amount = $_POST['amount']; // รับค่า amount จากฟอร์ม 
  
  // ตัวอย่างการใช้งาน Omise API เพื่อสร้าง charge
  $charge = OmiseCharge::create([
      'amount' => $amount,
      'currency' => 'thb',
      'card' => $_POST['omiseToken'],
      ]);

      if($charge['status'] == 'successful'){
        echo "success.";
header('Location: ../testPayment.php');

      }else{
        print_r($charge);
      }

?>