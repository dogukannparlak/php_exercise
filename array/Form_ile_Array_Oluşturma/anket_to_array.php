<?php
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$usser_data= array(
    'name' => $name,
    'age' => $age,
    'gender' => $gender
);
echo "Your name :". $name."<br>";
echo "Your age :". $age."<br>";
echo "Your Gender :".$gender."<br>";

print_r($usser_data);

