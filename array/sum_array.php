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
<form name="sum" method="post" >
    <label>
        <p>number 1</p>

        <input type="number" name="num1">
    </label>
    <label>
        <p>number 2</p>

        <input type="number" name="num2">
    </label>
    <label>
        <p>number 3</p>

        <input type="number" name="num3">
    </label>
    <label>
        <p>number 4</p>

        <input type="number" name="num4">
    </label>
    <label>
        <p>number 5</p>

        <input type="number" name="num5">
    </label>
    <br>
    <input type="submit" value="sum">


</form>

</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["num3"]) && isset($_POST["num4"]) && isset($_POST["num5"])){
//        $num1 = $_POST["num1"];
//        $num2 = $_POST["num2"];
//        $num3 = $_POST["num3"];
//        $num4 = $_POST["num4"];
//        $num5 = $_POST["num5"];
//        $sum = array($num1,$num2,$num3,$num4,$num5);

        for($i = 0; $i < 6; $i++){
            if(isset($_POST["num$i"])){
                $sum[]= $_POST["num$i"];
            }
        }
    }

    echo array_sum($sum);
}