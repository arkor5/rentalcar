<?php
$host='localhost';
$user='root';
$pass='';
$database='rentalcar';
$conn=mysqli_connect($host, $user, $pass, $database);
if (!$conn) {
    echo "Нет подключения" . mysqli_connect_error();
}
?>