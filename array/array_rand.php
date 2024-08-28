<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="get" >
    <input name="random" value="true" type="hidden">
    <input  value="Karıştır" type="submit">
</form>
</body>

<?php
$array = array(1, 2, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['random']) && $_GET['random'] == 'true') {
        $random = array_rand($array);
        echo $random;

    }
}