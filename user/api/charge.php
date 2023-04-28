<?
  require_once '../omise-php/lib/Omise.php'; // เรียกใช้ไฟล์ Omise.php ของ Omise API

  define('OMISE_SECRET_KEY', 'skey_test_5v9mk4woli0xk0w6zx9'); // กำหนดค่า OMISE_SECRET_KEY ของคุณ
  define('OMISE_API_VERSION', '2015-11-17');


  $amount = $_POST['amount']; // รับค่า amount จากฟอร์ม

  // ตัวอย่างการใช้งาน Omise API เพื่อสร้าง charge
  $charge = OmiseCharge::create([
    'amount' => $amount,
    'currency' => 'thb',
    'card' => $_POST['omiseToken'],
    ]);

  if($charge['status'] == 'successful'){
  session_start();

  $id = $_SESSION['personal_id'];

  require_once "./services.php";

  $update = new DB_con();
  $data = array(
    'payment_status' => '1'
  );
  if($update->updateProfile($data,'info_personal',$id)){
    $_SESSION['flash_message'] = 'Payment is completed.';
    $_SESSION['flash_status'] = 1;
  }else{
    $_SESSION['flash_message'] =  "Some think went wrong !";
    $_SESSION['flash_status'] = 0;
  }

  header('Location: ../main.php');

}

?>