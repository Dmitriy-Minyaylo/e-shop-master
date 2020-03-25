<?php
  include "configs/db.php";
  include "parts/header.php";
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
        
        <li class="breadcrumb-item active" aria-current="page">Это ваши заказы</li>
    </ol>
</nav>

<div class="row" id="goots">
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Count</th>
          <th scope="col">Cost</th>
          <th scope="col">Options</th>
        </tr>
      </thead>
      <tbody>
    <?php
    // проверка на существования товара в телеге
    if(isset($_COOKIE["telezhka"])){
        //преобразования с json в обычный массив
        $telezhka = json_decode($_COOKIE["telezhka"], true);
        //цикл для обработки инфо о товарах тележки
        for ($i=0; $i < count($telezhka["telezhka"]); $i++) { 
        //получения результата после коннекта к БД
        $sql = "SELECT * FROM products WHERE id=" . $telezhka["telezhka"][$i]["product_id"];
        $result = $conn->query($sql);
        //получение значения продукта
        $product = mysqli_fetch_assoc($result);
        
         ?>
        <!-- в цикле делаем строки с товаром нашей таблицы  -->
      <tr>
          <th scope="row"><?php echo $product['id'] ?></th>
          <td><?php echo $product['title'] ?></td>
          <td><input type="text" name="count" value="<?php  echo $telezhka["telezhka"][$i]['count']; ?>" oninput="countCost(this, value, <?php echo $product['id']; ?>)"></td>
          <td><?php echo $telezhka['telezhka'][$i]['cost']; ?></td>
          <td><button onclick="deleteProductTelezhka(this, <?php echo $product['id'] ?>)" class="btn btn-danger">Delete</button></td>
          
        </tr>
    <?php
        }
    }
    ?>
        
      </tbody>
    </table>
</div> <!-- / .row -->
<!-- Создаем форму заказа -->

<h4 class="card-title">Оформление заказа</h4>
<form method="POST" action="modules/telezhka/zakaz.php">
    <div class="form-group">
        <label for="exampleFormControlInput1">Ф.И.О. Заказчика</label>
        <input type="text" name="name_user" class="form-control" id="exampleFormControlInput1" placeholder="Иванов Иван Иванович">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Ваш Email(Login)</label>
        <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Dmitriy_proger@i.ua">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Адресс доставки</label>
        <input type="text" name="adress" class="form-control" id="exampleFormControlInput1" placeholder="город, улица, этаж, квартира">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Контактный телефон</label>
        <input type="text" name="telephone" class="form-control" id="exampleFormControlInput1" placeholder="+380ХХ-XXX-XX-XX">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Ваши пожелания</label>
        <textarea type="text" name="content"  class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    
    <button name = "submit" value="1" type="submit" class="btn btn-primary ">Готово</button>
</form>

<?php
  // футер
  include "parts/footer.php";
?>