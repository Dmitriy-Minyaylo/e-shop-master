<?php
  include "configs/db.php";
  include "parts/header.php";

  //достать ID из таблицы "categories"
$sql = "SELECT * FROM categories WHERE id =" . $_GET["id"];
// приконектить полученные данные
$result = $conn->query($sql);
// резутат с БД в массив
$category = mysqli_fetch_assoc($result);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category['title']; ?></li>
  </ol>
</nav>

<div class="row">
    <?php
    //достать все по выбранному ID из таблицы "products"
    $sql = "SELECT * FROM products WHERE category_id=" . $_GET["id"] ;
    // приконектить полученные данные
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {  
        include "parts/product_card.php";
    }
?>
</div> <!-- / .row -->
        
<?php
  include "parts/footer.php"
?>