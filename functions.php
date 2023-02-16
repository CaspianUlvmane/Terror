<?php
function sendJson ($message, $status = 200){

    $error = ["message" => $message, "status" => $status ]; 
    $json = json_encode($error);

    echo $json;
    exit;
}
?>