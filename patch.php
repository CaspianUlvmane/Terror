<?php
require_once "./functions.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod != "PATCH"){
    $error = ["Error" => "Invalid request method", "method" => $requestMethod];
    
    sendJson($error, 400);
}

$receivedJsonData = file_get_contents("php://input");
$receivedData = json_decode($receivedJsonData, true);

$filename = "select.json";

$json = file_get_contents($filename);
$selected = json_decode($json, true);
$name = $receivedData["name"];

foreach($selected as $index => $person){
    if($person["name"] === $name){
        if($person["recently"] == true){
            $error = ["Error" => "User was recently picked! Try again!"];
            sendJson($error, 400);
        }
        $person["Picked"]++;
        $person["recently"] = true;
        $selected[$index] = $person;
        continue;
    }
    $person["recently"] = false;
    $selected[$index] = $person;
}  
$json = json_encode($selected, JSON_PRETTY_PRINT);
file_put_contents($filename, $json);
sendJson($selected);
?>