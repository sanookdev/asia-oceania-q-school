<?

require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
define('OMISE_PUBLIC_KEY', 'pkey_test_5v9mkntvtg6u58w5jut');
define('OMISE_SECRET_KEY', 'skey_test_5v9mk4woli0xk0w6zx9');

print_r($_POST);
exit();

$charge = OmiseCharge::create(array(
  'amount' => 450000,
  'currency' => 'thb',
  'card' => $_POST["omiseToken"]
));

echo($charge['status']);

print('<pre>');
print_r($charge);
print('</pre>');

?>