<?php
$host = 'localhost'; // адрес сервера 
$database = 'shop-master'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

// подключаемся к серверу
$conn = new mysqli($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($conn));
 
// выполняем операции с базой данных
     
// подключаем кодировку
$conn->set_charset("utf8");

?>

