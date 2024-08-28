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
<form method="post" name="update">
    <input type="text" name="item">
    <input type="submit" name="add" value="add item">
    <input type="submit" name="show" value="show array">
</form>
</body>
</html>
<?php
//$array = array(1,"a","b","c","kalem",123);
//if($_SERVER["REQUEST_METHOD"] == "POST"){
//    if(isset($_POST["item"])){
//        $array[] = $_POST["item"];
//    }
//
//    if (isset($_POST['show'])){
//        echo "<strong>array:</strong> <br>";
//        print_r($array);
//
//   }
//
//}
session_start();
if (!isset($_SESSION['array1']) && !isset($_SESSION['array2'])){
    $_SESSION['array1'] = array(1, "a", "b", "c", "kalem", 123);
    $_SESSION['array2'] = array();
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['add']) && !empty($_POST["item"])){
        $_SESSION['array1'][] = $_POST["item"];
        $_SESSION['array2'][] = $_POST["item"];
    }

    if(isset($_POST['show'])){
        echo "<br> <strong>array1:</strong> <br>";
        print_r($_SESSION['array1']);
        echo "<br><strong>array2:</strong> <br> ";
        print_r($_SESSION['array2']);
    }
}
