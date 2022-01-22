<?php 
$response = $_REQUEST;

var_dump($response);

$fp = fopen('scholarly.json', 'w');
fwrite($fp, $response);
fclose($fp);


?>