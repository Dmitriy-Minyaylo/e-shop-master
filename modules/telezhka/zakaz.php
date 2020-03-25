<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
include $_SERVER["DOCUMENT_ROOT"] . "/configs/configs.php";
include $_SERVER["DOCUMENT_ROOT"] . "/modules/telegram/send-message.php";

// проверка был ли POST - защищенные данные
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    //получаем пользователя по номеру телефона
    $sql = "SELECT * FROM users WHERE telephone LIKE '" . $_POST["telephone"] . "'";
    $user_id = 0;
    // приконнектить полученные данные
    $result = $conn->query($sql);
    if($result->num_rows > 0 ){
        $user = mysqli_fetch_assoc($result);
        $user_id = $user["id"];
    } else {
        $sql = "INSERT INTO users (`login`, `telephone`) VALUES ('" . $_POST["email"] . "','" . $_POST["telephone"] . "');";

        if($conn->query($sql)){
            echo "User Added!";
            $user_id = $conn->insert_id;
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
        // мониторим таблицу telezhka
        $zakaz_sql = "INSERT INTO `telezhka` (`user_id`, `products`, `adress`, `telephone`, `content`, `name_user`) VALUES ('" . $user_id . "', '" . $_COOKIE["telezhka"] . "', '" . $_POST["adress"] . "',
            '" . $_POST["telephone"] . "', '" . $_POST["content"] . "', '" . $_POST["name_user"] . "')";
        
        // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
            if($conn->query($zakaz_sql)) {
            //удаляем куки в тележке и на главной
            setcookie("telezhka","", 0, "/");
            echo "<h2> Вы сделали заказ. Ура! </h2>";
            echo "<a href=\"/\">На главной Вас еще ждут товары!</a>";

            message_to_telegram("Внимание! Новый заказ");
            } else {
                echo "<h2> Не удалось сделать заказ. Извините </h2>";
            }
        }

?>
