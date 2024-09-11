<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

</head>

<body>
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
        background: #000;
    }

    .signup {
        width: 400px;
        background: #222;
        padding: 40px;
        border-radius: 4px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.9);
        text-align: center;
    }

    .signup h2 {
        font-size: 2em;
        color: #0f0;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    .signup .form {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .signup .form .inputBox {
        position: relative;
    }

    .signup .form .inputBox input {
        width: 100%;
        background: #333;
        border: none;
        outline: none;
        padding: 15px;
        border-radius: 4px;
        color: #fff;
        font-weight: 500;
        font-size: 1em;
    }

    .signup .form .inputBox label {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
        transition: 0.5s;
        pointer-events: none;
        font-size: 1em;
    }

    .signup .form .inputBox input:focus ~ label,
    .signup .form .inputBox input:valid ~ label {
        top: -10px;
        font-size: 0.8em;
        color: #fff;
    }

    .signup .form .inputBox input[type="submit"] {
        padding: 10px;
        background: #0f0;
        color: #000;
        font-weight: 600;
        font-size: 1.35em;
        letter-spacing: 0.05em;
        cursor: pointer;
    }

    .signup .form .links {
        display: flex;
        justify-content: space-between;
    }

    .signup .form .links a {
        color: #fff;
        text-decoration: none;
    }

    .signup .form .links a:nth-child(2) {
        color: #0f0;
        font-weight: 600;
    }

    input[type="submit"]:active {
        opacity: 0.6;
    }
</style>