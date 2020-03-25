<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "categories";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
//активная вкладка ПРОДУКТЫ
$page = "categories";

//достать ID из таблицы "categories"
$sql = "SELECT * FROM categories WHERE id = " . $_GET["id"];

// приконектить полученные данные
$result = $conn->query($sql);
// резутат с БД в массив
$row = mysqli_fetch_assoc($result);

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
        
        <li class="breadcrumb-item active" aria-current="page">Edit сategory</li>
    </ol>
</nav>
<h4 class="card-title"> Edit category </h4>
<form method="POST">

    <div class="form-group">
        <label for="exampleFormControlInput1">Введите новое название категории</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['title'] ?>">
    </div>
            
    <button name="submit" value="1" type="submit" class="btn btn-primary">Готово</button>
    <?php var_dump($row["title"]);
        //Если существуют
        if (isset($_POST["submit"])) {
            // мониторим таблицу categories
                $sql = "UPDATE `categories` SET `title` = '" . $_POST["title"] . "' WHERE `categories`.`id` =" . $_GET["id"]; 
                // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
                    if(mysqli_query($conn, $sql)) {
                        header ("Location: /admin/categories.php ");
                    } else {
                        echo "<h2> Редактирование category не выполнено !!! </h2>";
                    }
                }
             ?>    
</form>

<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>  
