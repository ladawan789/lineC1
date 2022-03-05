<?php
$serverName = '10.11.1.65\SQLExpress';
$userName = 'sa_cl';
$userPassword = 'Snc@C001ng';
$dbName = 'Camera';
 
try{
	$conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
die(print_r($e->getMessage()));
}

?>