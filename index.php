<?php
  include "configs/db.php";
  include "parts/header.php";
  
  // подключение базы данных
mysqli_select_db($conn, 'shop-master');
// определеляем сколько результатов будем видеть на странице
$results_per_page = 6;
// узнаем количество результатов, хранящихся в базе данных
$sql='SELECT * FROM products';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
// определили количество доступных страниц
$number_of_pages = ceil($number_of_results/$results_per_page);
// определили номер страницы где находимся в настоящее время 
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
};

// определить начальный номер ограничения LIMIT для результатов на странице отображения
$this_page_first_result = ($page - 1)*$results_per_page;
// получить выбранные результаты из базы данных и отобразить их на странице
$sql2='SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql2);
?>

<div class="row" id="products">
  <?php
  //достать все из таблицы "products" и поставить ограницение в 6 товаров
  $sql = 'SELECT * FROM products LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
  // приконектить полученные данные
  $result = $conn->query($sql);
  while ($row = mysqli_fetch_assoc($result)) {  
      include "parts/product_card.php";
  }
  ?> 
</div> <!-- / .row -->

<!-- Кнопка "Показать еще" -->
<div class="row justify-content-center">
  <div class="col-4">
    <input type="hidden" value="<?php echo $page ?>" id="current-page">
    <button class="btn btn-primary btn-lg " id="show-more">Показать еще</button>
  </div>
</div>  
<!-- Bootstrap-вставка для пагинации -->
<nav aria-label="Странички">
    <ul class="pagination justify-content-center mt-3">
        <?php 
        
        // отображать ссылки на страницы
        for ($page=1; $page<=$number_of_pages; $page++) {  
            // активная вкладка, если существует GET и он равен page
                if(isset($_GET['page']) && $_GET['page'] == $page) {   
                echo "<li class='page-item active'><a class='page-link' href='/index.php?page=" . $page . "'>" . $page . "</a></li>";            
            } else {
                echo "<li class='page-item'><a class='page-link' href='/index.php?page=" . $page . "'>" . $page . "</a></li>";
                }
            };
        ?>
    </ul>
</nav>


<?php
  // футер
  include "parts/footer.php";
?>