<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login">

<div class="signin">
    <h2>Login</h2>
    <form class="form" method="post" action="login.php">
        <div class="inputBox">
            <input type="text" name="username" required placeholder=" ">
            <label>Username</label>
        </div>
        <div class="inputBox">
            <input type="password" name="password" required placeholder=" ">
            <label>Password</label>
        </div>
        <div class="links">
            <a href="#">Forgot Password</a>
            <a href="signup.php">Signup</a>
        </div>
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['userdata'])) {
    $_SESSION['userdata'] = array();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $authenticated = false;
    foreach ($_SESSION['userdata'] as $user) {
        if ($user['username1'] == $username && $user['password1'] == $password) {
            $authenticated = true;
            $userId = $user['id'];
            break;
        }
    }

    if ($authenticated) {
        $_SESSION['user_id'] = $userId;
        header("Location: main.php");
        exit();
    } else {
        echo '<pre style="color: white;">Kullanıcı adı veya şifre yanlış.</pre>';
    }
}

// Debugging output for session data
//echo '<pre style="color: white;">';
////print_r($_SESSION['userdata']);
//echo '</pre>';
?>

