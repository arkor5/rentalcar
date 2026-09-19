<?php
session_start();
include 'config.php';
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
$userid=$_SESSION['userid'];
$sql="SELECT o.id, o.date, c.name, c.price FROM orders o JOIN cars c ON o.carid = c.id WHERE o.userid = $userid ORDER BY o.id DESC";
$result=$conn->query($sql);
?>

<html>
    <head>
        <title>Кабинет</title>
    </head>
    <body>
        <a href="logout.php">Выход</a>
        <a href="index.php">Главаня</a>
        <h1>Заказы</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?>P</td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>