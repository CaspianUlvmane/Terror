<?php

require_once "./functions.php";

$filename = "select.json";

$json = file_get_contents($filename);
$selected = json_decode($json, true);

if(isset($_GET["users"])){
    sendJson($selected);
}

$error = ["Error" => "Bad params"];
sendJson($error, 400);
?>