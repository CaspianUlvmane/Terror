<?php
function sendJson ($data, $status = 200){
    header("Content-Type: application/json");

    http_response_code($status);
    $json = json_encode($data);

    echo $json;
    exit();
}
?>