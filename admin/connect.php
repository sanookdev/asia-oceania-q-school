<?
define("HOSTDB", "localhost");
define("USERDB", "oceania_admin");
define("PASSDB", "tmt@33*2562");
define("NAMEDB", "oceania_asia-q-school");
$mysqli = new mysqli(HOSTDB,USERDB,PASSDB,NAMEDB);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>