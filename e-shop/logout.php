<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çıkış</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="logout">
<?php
// Oturumu başlat
session_start();

// Tüm oturum değişkenlerini temizle  session_unset();


// Oturumu tamamen sonlandır  session_destroy();


echo "Oturum başarıyla kapatıldı.<br>";
?>

<a href="login.php" class="button">LOGİN</a>
