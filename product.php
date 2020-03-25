<?php
    include "configs/db.php";
    include "parts/header.php";
    //достать из таблицы "products" с полученным ID
    $sql = "SELECT * FROM products WHERE id=" . $_GET["id"];
    // приконектить полученные данные
    $result = $conn->query($sql);
    //вывод в массив
    $row = mysqli_fetch_assoc($result); 
    // получаем результат при коннекте к БД categories
    $cat_result = $conn->query("SELECT * FROM categories WHERE id=" . $row["category_id"]);
    // вывод в массив данных полученных с categories
    $category = mysqli_fetch_assoc($cat_result); 
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="cat.php?id=<?php echo $category['id'] ?>"><?php echo $category['title'] ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
  </ol>
</nav>

<div class="row">

        <div class="col-12">
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $row['title'] ?>
                    </h5>
                    <p class="card-text"><?php echo $row['description'] ?></p>
                    <p class="card-text"><?php echo $row['content'] ?></p>
                    <a href="#" class="btn btn-primary">В корзину</a>
                </div>
            </div>
        </div>  <!-- / .col-4 --> 
</div> <!-- / .row -->
        
<?php
  include "parts/footer.php"
?>