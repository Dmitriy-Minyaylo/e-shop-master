<?php 
// глубокое вложение конфигурации
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
// переменная page показывает сколько страниц с 6 записями мы уже имеем
$page = $_GET["page"];
//offset показывает номер страницы - 6 число записей на 1 странице
$offset = $page * 6; 

$sql= "SELECT * FROM products LIMIT 6 OFFSET " . $offset; 
 // приконнектить полученные данные
 $result = $conn->query($sql);
 while ($row = mysqli_fetch_assoc($result)) {  
    include $_SERVER["DOCUMENT_ROOT"] . "/parts/product_card.php";
 }
?>
