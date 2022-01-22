<?php 
$response = file_get_contents('php://input');

var_dump($response);

$fp = fopen('scholarly.json', 'w');
fwrite($fp, $response);
fclose($fp);


?>