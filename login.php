<?php
session_start();
if(isset($_POST['login'])){
    $login = $_POST['login'];
    $password = $_POST['password'];


if($login == 'admin' && $password == 'Tajnehaslo321'){
    $_SESSION['login'] = $login;
    header('location: wyniki.php');
    exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="login">Username:</label>
        <input type="text" id="login" name="login">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>