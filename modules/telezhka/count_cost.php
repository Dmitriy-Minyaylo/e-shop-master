<?php

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
// проверка на существование пост запроса
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
	if ($_POST['count'] != "" && $_POST['id'] != "") {
		if (isset($_COOKIE['telezhka'])) {
			$telezhka = json_decode($_COOKIE['telezhka'], true);
			for ($i=0; $i < count($telezhka['telezhka']); $i++) {
				$sql = "SELECT * FROM products WHERE id=". $telezhka['telezhka'][$i]['product_id'];
				$product = mysqli_fetch_assoc( $conn->query( $sql ) ); 
				if ($_POST['id'] == $telezhka['telezhka'][$i]['product_id']) {
					$telezhka['telezhka'][$i]['count'] = $_POST['count'];
					echo $telezhka['telezhka'][$i]['cost'] = $product['cost'] * $_POST['count'];
				}
			}
		// преобразует данные из таблице продуктов в json
		$jsonProduct = json_encode($telezhka);
		// чистим предидущую куку на всем сайте
		setcookie("telezhka", "", 0, "/");
		// заносим новые данные о товаре в куку
		setcookie("telezhka", $jsonProduct, time() + 60*60, "/");
		// получаем количество товаров и кодируем в json, для предачи его в js
		}
	}
}


// для подсчета стоимости товара и изменения его количества количества в input
// ==============================================
// 1. Получить с помощью ajax данные для подсчета
// 2. Пройтись по циклу и найти нужный товар для подсчета
// 3. Подвести итоговую стоимость
// 4. Передать результат в таблицу телеги

?>

