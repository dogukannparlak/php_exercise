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
<form name="index" method="get" >
    <label>
        <p> index değerini girniz : </p>
        <input type="number" name="index">
        <input type="submit">
    </label>
</form>
</body>
</html>
<?php
$cities = array("İstanbul", "Ankara", "İzmir", "Bursa", "Antalya");

if(isset( $_GET["index"])){
    $index = $_GET["index"];
    if(is_numeric($index) && $index >= 0 && $index < count($cities)) {

        echo"seçilen şehir". $cities[$index];
    }
    else{
            echo "lütfen geçerli bir değer giriniz ( 0 dahil  ".count($cities)." aralığında)";
        }

}
else{
    echo "lütfen bir değer giiriniz";
}