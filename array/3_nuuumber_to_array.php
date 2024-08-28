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
<form method="post" name="numbers">


    number 1:  <input name="num1" type="number"> <br><br>
    number 2: <input name="num2" type="number"> <br><br>
    number 3: <input name="num3" type="number"> <br>
    <input type="submit">
</form>

</body>
</html>
<?php
if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['num3'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    echo "number 1: " . $num1 . "<br>";
    echo "number 2: " . $num2 . "<br>";
    echo "number 3: " . $num3 . "<br>";
    $numbers = array($_POST['num1'],$_POST['num2'],$_POST['num3']);
    print_r($numbers);
    echo " <br>  girilen sayılar : <br>";
    foreach ($numbers as $number) {
        echo"-" .$number . "<br>";
    }
}

