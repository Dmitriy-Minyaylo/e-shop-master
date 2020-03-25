<?php
// проверка был ли POST - защищенные данные
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_COOKIE["telezhka"])){
        
        //преобразования с json в обычный массив
        $telezhka = json_decode($_COOKIE["telezhka"], true);
        //через цикл проходимся по всему массиву
        for ($i=0; $i < count($telezhka["telezhka"]); $i++) { 
            if( $telezhka["telezhka"][$i][ "product_id" ] == $_POST["id"] ){
                //удаление с массива через unset, чисто удаление не подходит в данном случае, т.к удаляет порядковый id без сдвига 0,1,3,4,5.... 2 к примеру, удалили
                unset($telezhka["telezhka"][$i]);
                //дополнительно нужно использовать sort
                sort($telezhka["telezhka"]); 
    
            }
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
};   
?>