<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="signup">
<div class="signup">
    <h2>Sign Up</h2>
    <form action="signup.php" method="post" class="inputBox">
        <div class="form">
            <div class="inputBox">
                <input type="text" name="username1" required>
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password1" required>
                <label>Password</label>
            </div>
            <div class="links">
                <a href="#">Forgot Password?</a>
                <a href="login.php">Login</a>
            </div>
            <div class="inputBox">
                <input type="submit" value="Sign Up">
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['userdata'])) {
    $_SESSION['userdata'] = array();
}

if(isset($_POST['username1']) && isset($_POST['password1'])) {
    $newUser = array(
        "id" => uniqid(),
        "username1" => $_POST['username1'],
        "password1" => $_POST['password1']
    );

    $_SESSION['userdata'][] = $newUser;
}

//echo '<pre style="color: white;">';
////print_r($_SESSION['userdata']);
//echo '</pre>';
?>


