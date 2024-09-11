<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sayfası</title>

</head>
<body>
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
echo '<pre style="color: white;">';
print_r($_SESSION['userdata']);
echo '</pre>';
?>



<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #000;
    }

    .signin {
        width: 400px;
        background: #222;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9);
        text-align: center;
    }

    h2 {
        font-size: 2em;
        color: #0f0;
        margin-bottom: 40px;
        text-transform: uppercase;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .inputBox {
        position: relative;
    }

    .inputBox label {
        position: absolute;
        left: 10px;
        top: 10px;
        background: #222;
        padding: 0 5px;
        color: #aaa;
        font-size: 0.9em;
        transition: 0.3s;
        pointer-events: none;
    }

    .inputBox input {
        width: 100%;
        background: #333;
        border: none;
        outline: none;
        padding: 20px 10px 10px;
        border-radius: 4px;
        color: #fff;
        font-weight: 500;
    }

    .inputBox input:focus + label,
    .inputBox input:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 0.8em;
        color: #0f0;
    }

    .form .links {
        display: flex;
        justify-content: space-between;
    }

    .form .links a {
        color: #fff;
        text-decoration: none;
    }

    .form .links a:nth-child(2) {
        color: #0f0;
        font-weight: 600;
    }

    input[type="submit"] {
        padding: 10px;
        background: #0f0;
        color: #000;
        font-weight: 600;
        font-size: 1.2em;
        cursor: pointer;
    }

    input[type="submit"]:active {
        opacity: 0.7;
    }
</style>