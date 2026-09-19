<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['carid'])) {
        if (!isset($_SESSION["userid"])) {
            header("Location: login.php");
            exit();
        }
        $carid=$_POST["carid"];
        $userid=$_SESSION["userid"];
        $date=date("Y-m-d");
        $conn->query("INSERT INTO orders (userid, carid, date) VALUES ('$userid', '$carid', '$date')");
        header("Location: lichcab.php");
        exit();
    }
}
$result=$conn->query("SELECT * FROM cars");
?>

<html>
    <head>
        <title>Аренда</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            echo "<a href='lichcab.php'>Кабинет</a>";
            echo "<a href='logout.php'>Выход</a>";
        } else {
            echo "<a href='login.php'>Вход</a>";
            echo "<a href='register.php'>Регистрация</a>";
        }
        ?>
        <h1>Аренда автомобилей</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Цена</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?>P</td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="carid" value="<?php echo $row['id']; ?>">
                                <button type="submit">Заказать</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>