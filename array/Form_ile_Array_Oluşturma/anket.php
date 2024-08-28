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
<form action="anket_to_array.php" method="post" name="anket">
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
