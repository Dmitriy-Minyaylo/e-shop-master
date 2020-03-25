<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
//активная вкладка ПРОДУКТЫ
$page = "products";

//достать ID из таблицы "products"
$sql = "SELECT * FROM products WHERE id = " . $_GET["id"];

// приконектить полученные данные
$result = $conn->query($sql);
// резутат с БД в массив
$row = mysqli_fetch_assoc($result);

//Если существуют
if (isset($_POST["title"])) {
    // мониторим таблицу products
        $sql = "UPDATE `products` SET `title` = '" . $_POST["title"] . "', `description` = '" . $_POST["description"] . "', `content` = 
        '" . $_POST["content"] . "', `category_id` = '" . $_POST["category_id"] . "' WHERE `products`.`id` ='" . $_GET["id"] . "'";
        // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
            if(mysqli_query($conn, $sql)) {
                header ("Location: /admin/products.php ");
            } else {
                echo "<h2> Редактирование продукта не выполнено !!! </h2>";
            }
        }
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit product</li>
    </ol>
</nav>
<h4 class="card-title">+++ Edit Product +++</h4>
<form method="POST">

    <div class="form-group">
        <label for="exampleFormControlInput1">Название продукта</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['title'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Краткое описание</label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['description'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Полное описание</label>
        <textarea type="text" name="content"  class="form-control" id="exampleFormControlTextarea1" value="
            <?php echo $row['content'] ?>">
        </textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Категория</label>
        <select class="form-control" name="category_id">
            <option value="0">Не выбрано</option>
                <?php 
                    // запрос с БД на все с categories
                    $sql = "SELECT * FROM categories";
                    // результат при конекте к базе
                    $result = $conn->query($sql);
                    // через цикл заносим данные в массив
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                    }
                ?>
        </select>
    </div>
                        
    <button type="submit" class="btn btn-primary">Готово</button>

</form>

<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>  
