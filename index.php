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
    <link rel="stylesheet" href="style.css">
    <title>Terror App</title>
</head>
<body>
    <div id="wrapper">
        <h1>Terror</h1>
        <div id="current">
            <p>Current Users</p>
            <div><?php foreach($selected as $select){echo $select["name"];}?></div>
        </div>
        <div id="addNew">Add someone to terrorise 
            <input type="text" placeholder="Name">
            <button id="add">Add</button>
        </div>
        <div id="render"><button id="getNew">Terror</button><div id="terrorise"></div></div>
    </div>

    <script src="index.js"></script>
</body>
</html>