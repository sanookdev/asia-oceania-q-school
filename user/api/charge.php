<?
  require_once '../omise-php/lib/Omise.php'; // เรียกใช้ไฟล์ Omise.php ของ Omise API
  require_once "./services.php";

  define('OMISE_API_VERSION', '2015-11-17');
  define('OMISE_PUBLIC_KEY', 'pkey_test_5vhvxzw47q7827bebv4');
  define('OMISE_SECRET_KEY', 'skey_test_5vhvxzy1rep2z1l8k4y');
  
  session_start();

  $id = $_SESSION['personal_id'];

  $services = new DB_con();

  $amount = $_POST['amount']; // รับค่า amount จากฟอร์ม 
  
  if($services->checkPayment($id)){
    $_SESSION['flash_message'] =  "You have successfully made the payment.";
    $_SESSION['flash_status'] = 0;
  }else{
  // ตัวอย่างการใช้งาน Omise API เพื่อสร้าง charge
  $charge = OmiseCharge::create([
      'amount' => $amount,
      'currency' => 'thb',
      'card' => $_POST['omiseToken'],
      ]);

      if($charge['status'] == 'successful'){

      $data = array(
        'payment_status' => '1'
      );
      if($services->updateProfile($data,'info_personal',$id)){
        $_SESSION['flash_message'] = 'Payment is completed.';
        $_SESSION['flash_status'] = 1;
      }else{
        $_SESSION['flash_message'] =  "Some think went wrong !";
        $_SESSION['flash_status'] = 0;
      }
    }
  }
header('Location: ../main.php');

?>