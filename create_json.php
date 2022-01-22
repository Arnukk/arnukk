<?php 
$response = $_REQUEST;

//var_dump($_SERVER);

$fp = fopen('scholarly.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);


?>