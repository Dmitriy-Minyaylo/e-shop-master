<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//активная вкладка ПРОДУКТЫ
$page = "products";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//Если существует передача введенных данных путем нажатия на кнопку с Submit
  if (isset($_POST["submit"])) {

    // мониторим таблицу products
    $add_sql ="INSERT INTO `products` (`title`, `description`, `content`, `category_id`) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "',
        '" . $_POST["content"] . "', '" . $_POST["category_id"] . "')";
    
    // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
        if($conn->query($add_sql)) {
            header ("Location: /admin/products.php ");
        } else {
            echo "<h2> Добавление продукта не выполнено !!! </h2>";
        }
    }
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
        
        <li class="breadcrumb-item active" aria-current="page">Add product</li>
    </ol>
</nav>
<h4 class="card-title">+++ Add Product +++</h4>
<form method="POST">
    <div class="form-group">
        <label for="exampleFormControlInput1">Название продукта</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Трусы =)">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Краткое описание</label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Крутые стринги">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Полное описание</label>
        <textarea type="text" name="content"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Категория</label>
        <select class="form-control" name="category_id">
            <option value="0">Не выбрано</option>
                <?php 
                    // запрос с БД на все с categories
                    $sql = "SELECT * FROM categories";
                    // результат при коннекте к базе
                    $result = $conn->query($sql);
                    // через цикл заносим данные в массив
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                    }
                ?>
        </select>
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

