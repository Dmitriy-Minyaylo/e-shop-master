
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop-Master</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Shop-Master</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contacts.php">Contacts</a>
      </li>
    </ul>

  
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      <!-- верстка корзины -->
      <button class="btn ml-3" id="telezhka" type="submit">
        <div class="cart">
          <a href="/telezhka.php">
          <span>
          <?php 
          // если есть куки, то выводим значение 
              if (isset($_COOKIE['telezhka'])) {
                echo count(json_decode($_COOKIE['telezhka'], true)["telezhka"]);
          } else {
            echo "0";
          };
        ?>
          </span>
              <img src="img/cart.png" alt="Корзина">
              
          </a>
        </div>
      </button>
  </div>
</nav>  

<!-- создается контейнер с левой (вкладки) и правой частью -->
<div class="container">

    <div class="row m-2">
        <div class="col-3">
            <?php 
                include  $_SERVER["DOCUMENT_ROOT"] . "/parts/cat_nav.php"
            ?>
        </div> 
       
        <!-- Закрыли левую сторону -->

        <!-- Правая сторона - карточки товаров -->
        <div class="col-9">
            <div class="container">