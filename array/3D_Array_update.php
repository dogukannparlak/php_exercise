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
<form action="" method="post" name="anket">
    <p>Name</p>
    <label>
        <input name="name" type="text">
    </label>
    <p> Age </p>
    <label>
        <input name="age" type="number">
    </label>
    <p>Gender</p>
    <label>
        <select name="gender">
            <option value=" "> </option>
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="other">Other</option>
        </select>
    </label>
    <input type="submit">
</form>
</body>
</html>
<?php

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    if(isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["gender"]) && !empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["gender"])) {
//        $name = $_POST["name"];
//        $age = $_POST["age"];
//        $gender = $_POST["gender"];
//
//        if (!isset($_SESSION["kisiler"])) {
//            $_SESSION["kisiler"] = array(
//                array("name" => "Ali", "age" => 22, "gender" => "male"),
//                array("name" => "Ayşe", "age" => 24, "gender" => "female"),
//                array("name" => "Mehmet", "age" => 30, "gender" => "male"),
//                array("name" => "Fatma", "age" => 28, "gender" => "female"),
//                array("name" => "Ahmet", "age" => 25, "gender" => "male"),
//                array("name" => "Zeynep", "age" => 27, "gender" => "female"),
//                array("name" => "Hüseyin", "age" => 29, "gender" => "male"),
//                array("name" => "Elif", "age" => 23, "gender" => "female"),
//                array("name" => "Osman", "age" => 31, "gender" => "male"),
//                array("name" => "Gül", "age" => 26, "gender" => "female")
//            );
//
//            $_SESSION["kisiler"][] = array(
//                "name" => $name,
//                "age" => $age,
//                "gender" => $gender
//            );
//        }
//    }
//
//    if (isset($_SESSION['kisiler']))
//    {
//        echo "<h2>Kişi Listesi:</h2>";
//        echo "<ul>";
//        foreach ($_SESSION['kisiler'] as $kisi)
//        {
//            echo "<li>İsim: " . htmlspecialchars($kisi['name']) ."<li>yaş: " . htmlspecialchars($kisi['age']) ."<li>Cinsiyet: " . htmlspecialchars($kisi['gender']) . "</li> <br> ********************************************************************************************************* <br>";
//        }
//    }
//    echo "</ul>";
//}

$array  = array(
    array("name" => "Ali", "age" => 22, "gender" => "male"),
    array("name" => "Ayşe", "age" => 24, "gender" => "female"),
    array("name" => "Mehmet", "age" => 30, "gender" => "male"),
    array("name" => "Fatma", "age" => 28, "gender" => "female"),
    array("name" => "Ahmet", "age" => 25, "gender" => "male"),
    array("name" => "Zeynep", "age" => 27, "gender" => "female"),
    array("name" => "Hüseyin", "age" => 29, "gender" => "male"),
    array("name" => "Elif", "age" => 23, "gender" => "female"),
    array("name" => "Osman", "age" => 31, "gender" => "male"),
    array("name" => "Gül", "age" => 26, "gender" => "female")
);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["gender"])) {
        $array[]= array(
                $_POST["name"], // "name" =>
                $_POST["age"], //"age" =>
                $_POST["gender"] //"gender" =>
        );
        print_r($array);
//        foreach ($array as $value) {
//            echo $value['name'] . " " . $value['age'] . " " . $value['gender'] . "<br>";
//        }
    }
}