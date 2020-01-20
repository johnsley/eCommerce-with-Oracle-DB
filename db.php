<?php
session_start();
require_once 'MDB2.php';

$dsn = array(
'phptype' => 'oci8',

'hostspec' => 'localhost:1521/orcl',

'username' => 'admin',

'password' => 'admin123'
);

$db= MDB2::connect($dsn);

if (PEAR::isError($db)){
	die("Failed: " . $db-> getMessage());
}
?>