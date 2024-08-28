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
    <label >
       text:  <input type="text" name="item">
    </label>
    <label>
       index:  <input type="number" name="update1">
    </label>
    <input type="submit" name="update" value="update item">
</form>
</body>
</html>
<?php
if (!isset($_SESSION['array'])) {
    $_SESSION['array'] = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["item"]) && isset($_POST["update1"])){

        $index = (int)$_POST["update1"];
        $newitem = $_POST["item"];

        $_SESSION['array'][$index] = $newitem;
        print_r($_SESSION['array']);

        for ( $i=0 ;$i<count( $_SESSION['array']);$i++) {
            echo "<br>";
            echo $i."-". $_SESSION['array'][$i];
        }
    }
}