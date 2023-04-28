<?

require_once '../omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
define('OMISE_PUBLIC_KEY', 'pkey_test_5v9mkntvtg6u58w5jut');
define('OMISE_SECRET_KEY', 'skey_test_5v9mk4woli0xk0w6zx9');


print_r($_POST);
// echo $_POST['amount'];
// $charge = OmiseCharge::create(array(
//   'amount' => 450000,
//   'currency' => 'thb',
//   'card' => $_POST["omiseToken"]
// ));

// echo($charge['status']);

// if($charge['status'] == 'successful'){
//   session_start();

//   $id = $_SESSION['personal_id'];

//   require_once "./services.php";

//   $update = new DB_con();
//   $data = array(
//     'payment_status' => '1'
//   );
//   if($update->updateProfile($data,'info_personal',$id)){
//     $_SESSION['flash_message'] = 'Payment is completed.';
//     $_SESSION['flash_status'] = 1;
//   }else{
//     $_SESSION['flash_message'] =  "Some think went wrong !";
//     $_SESSION['flash_status'] = 0;
//   }

//   header('Location: ../main.php');

// }
?>