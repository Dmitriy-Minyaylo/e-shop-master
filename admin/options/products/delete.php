<?php    
/* подключаем базу данных */
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products";

//достать все из таблицы "products"
$sql = "SELECT * FROM products";
// приконектить полученные данные
$result = $conn->query($sql);
// резутат с БД в массив
$row = mysqli_fetch_assoc($result);

if(isset($_GET["id"])) {
    // мониторим таблицу products
        $del_sql ="DELETE FROM `products` WHERE `products`.`id` = '" . $_GET["id"] . "'";
        var_dump($del_sql);
        // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
            if(mysqli_query($conn, $del_sql)) {
                header ("Location: /admin/products.php ");
            } else {
                echo "<h2> Удаление продукта не выполнено !!! </h2>";
            }
        }

?> 