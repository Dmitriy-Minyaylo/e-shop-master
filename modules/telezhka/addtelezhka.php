<?php 

// добавляем в массив товаров
// добавить товару куку с жизнью в час 60*60
// глубокое вложение конфигурации
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

// проверка был ли POST - защищенные данные
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    //получаем товар по которому кликнули
    $sql = "SELECT * FROM products WHERE id=" . $_POST["id"];
    // приконнектить полученные данные
    $result = $conn->query($sql);
    $product = mysqli_fetch_assoc($result);  

    // работаем с json форматом - JS объект для преобразования с массива в текстовый вид, т.к php не может работать с выводом массивов
    //т.к. при выборе товара добавляется последний и только один товар, нужно сделать массив для "внутренности телеги"
   
    // проверка 
    if(isset($_COOKIE["telezhka"])){
        //преобразования с json в обычный массив
        $telezhka = json_decode($_COOKIE["telezhka"], true);
        //существует переменная самого товара
        $issetProduct = 0;
        // группировка одинаковых товаров - создаем цикл и проходимся по массиву, чтоб найти совпадения по ID 
            for ($i=0; $i < count($telezhka["telezhka"]) ; $i++) { 
                if( $telezhka["telezhka"][$i][ "product_id" ] == $product["id"] ){
                    $telezhka["telezhka"][$i]["count"]++;
                    $telezhka["telezhka"][$i]["cost"] = $product["cost"] * $telezhka["telezhka"][$i]["count"];
                    $issetProduct = 1;
                }
            }
            if ($issetProduct != 1){
                // создаем название вложенного массива и влажеваем во вложенный массив только ID продукта, т.к. куки может хранить только 4096 символов, а это граничет добавление разных товаров
            $telezhka["telezhka"][] = [
            "product_id" => $product["id"],
            "count" => 1,
            "cost" => $product["cost"],
        ];
            }
        
    } else {
        //если корзина пустая
        $telezhka = [ "telezhka" => [ 
            ["product_id" => $product["id"],
            "count" => 1,
            "cost" => $product["cost"] ]
            ] 
        ];
    }
    // преобразовуем массив в формат JSON
    // изначально мы выводили значение одного $product полученного с sql базы, но теперь влаживаем туда массив $telezhka с $product
    $jsonProduct = json_encode($telezhka);
    
    //удаляем куки в тележке и на главной
    setcookie("telezhka","", 0, "/");
    // создаем Куки товара в тележке - название, данные JSON, время жизни куки, послений "/" дает нам возможность видеть куки на всех страницах сайта
    setcookie("telezhka", $jsonProduct, time() + 60*60, "/");
    // выводим количество добавленного товара
    echo $jsonProduct;
}

?>
