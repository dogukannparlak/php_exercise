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
<form method="get" name="delete">
    <label for="dell">Silinecek öğe indexi : </label>
    <input type="number" name="del">
    <input type="submit" name="delete" value="delete item">

</form>
</body>
</html>
<?php
$array = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j");
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["delete"])){
        $del = $_GET["del"];
        unset($array[$del]);
        print_r($array);
        foreach($array as $item){
            echo "<br>";
            echo "<br>-".$item ."<br>";
        }
    }

}