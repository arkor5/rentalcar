<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $name=$_POST['name'];
    $login=$_POST['login'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    $sql="INSERT into users (name, login, mail, password) VALUES ('$name', '$login', '$mail', '$password')";
    $result=$conn->query($sql);
    if ($result !== false) {
        echo "Аккаунт добавлен";
        echo "<p>";
        echo "<a href='lichcab.php'>Вход</a>";
        exit();
    } else {
        echo "Ошибка";
    }
}
?>

<html>
    <head>
        <title>Регистрация</title>
    </head>
    <body>
        <h1>Регистрация</h1>
        <form method="POST">
            <label>Имя</label>
            <input type="text" name="name" required>
            <p>
            <label>Логин</label>
            <input type="text" name="login" required>
            <p>
            <label>Почта</label>
            <input type="text" name="mail" required>
            <p>
            <label>Пароль</label>
            <input type="text" name="password" required>
            <p>
            <button type="submit">Регистрация</button>
        </form>
        <a href="login.php">Вход</a>
        <a href="index.php">Главная</a>
    </body>
</html>