<?php

$filename = "select.json";

$selected = [];
if(!file_exists($filename)){
    $json = json_encode($selected, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
}

$json = file_get_contents($filename);
$selected = json_decode($json, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terror App</title>
</head>
<body>
    <div id="wrapper">
        <div id="current"></div>
        <div id="addNew">Add someone to terrorise 
            <input type="text" placeholder="Name">
            <button id="add">Add</button>
        </div>
        <div id="render"><button id="getNew">Terror</button><div id="terrorise"></div></div>
    </div>
</body>
</html>