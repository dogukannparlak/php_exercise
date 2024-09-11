<?php
// Oturumu başlat
session_start();

// Tüm oturum değişkenlerini temizle  session_unset();


// Oturumu tamamen sonlandır  session_destroy();


echo "Oturum başarıyla kapatıldı.<br>";
?>

<a href="login.php" class="button">LOGİN</a>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 50px;
    }

    .message {
        font-size: 18px;
        color: #333;
        margin-bottom: 20px;
    }

    .button {
        display: inline-block;
        font-size: 16px;
        color: #fff;
        background-color: #0066cc;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        border: none;
        cursor: pointer;
    }

    .button:hover {
        background-color: #004a99;
    }
</style>