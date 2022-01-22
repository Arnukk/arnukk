<?php 
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'http://localhost:8080',
    'https://areg.website'
];

if (in_array($origin, $allowed_domains)) {
    header('Access-Control-Allow-Origin: ' . $origin);
}

$response = $_REQUEST['retrievedObject'];

var_dump($_SERVER);

$fp = fopen('scholarly.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);


?>