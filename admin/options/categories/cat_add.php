<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//активная вкладка КАТЕГОРИИ
$page = "categories";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//Если существует передача введенных данных путем нажатия на кнопку с Submit
  if (isset($_POST["submit"])) {

    // мониторим таблицу products
    $add_sql ="INSERT INTO `categories` (`title`) VALUES ('" . $_POST["title"] . "')";
    
    // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
        if($conn->query($add_sql)) {
            header ("Location: /admin/categories.php ");
        } else {
            echo "<h2> Добавление категории не выполнено !!! </h2>";
        }
    }
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
        
        <li class="breadcrumb-item active" aria-current="page">Add сategory</li>
    </ol>
</nav>
<h4 class="card-title">~ ~ ~ Add Category ~ ~ ~ </h4>
<form method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Название категории</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Одежда">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Загрузите изображение</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <button name = "submit" value="1" type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>  

