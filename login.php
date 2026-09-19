<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $login=$_POST['login'];
    $password=$_POST['password'];
    $result=$conn->query("SELECT * FROM users WHERE login = '$login'");
    $row=$result->fetch_assoc();
    if ($row != false) {
        if ($row ['password']==$password) {
            $_SESSION['login']=$login;
            $_SESSION['userid']=$row['id'];
            header("Location: lichcab.php");
            exit();
        } else {
            echo "Неправильный логин или пароль";
        }
    } else {
        echo "Неправильный логин или пароль";
    }
}
?>

<html>
    <head>
        <title>Вход</title>
    </head>
    <body>
        <h1>Вход</h1>
        <form method="POST">
            <label>Логин</label>
            <input type="text" name="login" required>
            <p>
            <label>Пароль</label>
            <input type="password" name="password" required>
            <p>
            <button type="submit">Вход</button>
        </form>
        <a href="register.php">Регистрация</a>
        <a href="index.php">Главная</a>
    </body>
</html>