<!-- подключаем PHP всегда сверху! -->
<?php
/* подключаем базу данных */
include "configs/db.php";

/* проверка по email и паролю и имени*/
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["username"]) && // перенесли на следующую строку
        $_POST["username"] !="" && $_POST["email"] !="" && $_POST["password"] != "") {
    //получаем пароль пользователя через шифрование 
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email LIKE '" . $_POST["email"] . "' AND password LIKE '" . $password . "'";
    // задается через 2 параметр: 1. подключение базы данных, 2. подключение списка-скрипта с пользователями
    $result = mysqli_query ($conn, $sql);
    // mysqli_num_rows - получить количество результатов
    $col_users = mysqli_num_rows($result);

    if ($col_users == 1) {
        // mysqli_fetch_assoc - преобразует данные пользователя с БД в массив
        $user = mysqli_fetch_assoc($result);
        //создаем куки для хранения данных пользователя
        setcookie("user_id", $user["id"], time() + 1000);
        // при удачной авторизации мы попадаем на главную
        echo "<h2>Пользователь найден, но не верифицирован, на Вашей почте Вас ждет ссылка на подтверждение!</h2></br> ";
        echo "<h2>На данный момент отсылка на почту не работает, найдите письмо в локальной папке Диск:\ xampp\mailoutput - последнее письмо! Ну, а после ... Выбирайте >>></h2>";
  
    } else {
        echo "<h2>Что-то не так ... Может Вы не регестрировались?</h2>";
        echo "<a href=\"register.php\">Registration</a>";
        }
}; 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Логин</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Модальное окно входа -->
<div>
    <form method="POST" > 
        	
        <h2>Autorization</h2>
            <h3 class="name">
                UserName:<br/>
                <input type="text" name="username">
            </h3>
            <h3 class="post" >
                Email-adress:<br/>
                <input  type="text" name="email">
            </h3>
            <h3 class="pass">
                Password:<br/>
                <input type="password" name="password">
            </h3>
            <button class="submit" type="submit">Войти</button>
    </form>	
    
</div>
</body>
</html>
