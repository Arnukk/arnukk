<?php 
$origin = $_SERVER['HTTP_ORIGIN'];

$response = $_REQUEST['retrievedObject'];

var_dump($_SERVER);

$fp = fopen('scholarly.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);


?>