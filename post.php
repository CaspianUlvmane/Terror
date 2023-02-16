<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {

    sendJson("Invalid Request method", 400);
    
} 

$name = $_POST;
echo $name;

$json = file_get_contents($filename);
$selected = json_decode($json, true);

sendJson("bro das good")

?>