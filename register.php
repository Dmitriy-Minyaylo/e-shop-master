<?php
//============= Логика постороенния ===================
/* 
1. Сделать форму регистрации 
2. Сделать отправку формы
3. Сделать отправку формы со ссылкой на подтверждение рег-ии
4. Сделать страницу с подтвержением рег-ии

*/

include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";

//проверка существования нашей переменной u_code
if(isset($_GET["u_code"])) {
    $sql = "SELECT * FROM users WHERE confirm='" . $_GET["u_code"] . "'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $user = mysqli_fetch_assoc($result);
        $sql = "UPDATE `users` SET `verifided` = '1' WHERE `users`.`id` ='" . $user["id"] . "'";
        if($conn->query($sql)){
            echo "Позьзователь верифицирован!";
        }
    }
}
// переменная с уникальным числом дл ссылки
$u_code = generateRandomString(20);

// проверка был ли POST - защищенные данные
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    //получаем пароль пользователя через шифрование 
    $password = md5($_POST["password"]);

    // запрос в БД на регистрацию
    $sql = "INSERT INTO users (`login`, `password`, `email`, `confirm`) VALUES ('" . $_POST["username"] . "', '" . $password . "', '" . $_POST["email"]  . "', '$u_code')";
        
    // делаем сразу проверку
    if($conn->query($sql)) {
        echo " Пользователь зарегестрирован ";
        $link = "<a href='http://shop-master.local/register.php?u_code=$u_code'>Confirm</a>";
        // куда/тема/ссылка
        mail($_POST["email"], 'Register', $link);
    }

    //login 
    $sql = "SELECT * FROM users WHERE `login` = '" . $_POST["username"] . "' AND  `password` = '$password'";
    // выводим результат
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        echo "Пользователь найден! Можете войти";
        echo "<a href=\"login.php\"></br>GO to LOGIN</a>";
    } else {
        echo "Error";
    }
}
// функция для получения случайной строки для u_code
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <p>Username</br>
            <input type="text" name="username">
        </p>
        <p>Email</br>
            <input type="text" name="email">
        </p>
        <p>Password</br>
            <input type="password" name="password">
        </p>
        <button class="submit" type="submit">Register</button>
    </form>
</body>
</html>