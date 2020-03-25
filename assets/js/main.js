
var siteURL = "http://my-first-shop.zzz.com.ua/"; // когда переносим на продакшн то ссылка сменится

var btnShowMore = document.querySelector("#show-more");
// если найдена это кнопка на странице, тогда 
if (btnShowMore) {
    btnShowMore.onclick = function () {
        var currentPageInput = document.querySelector("#current-page");
        //создаем ajax запрос
        var ajax = new XMLHttpRequest();
        // открытие запроса ajax происходит путем получения данных через метод "GET" и куда мы эти данные отправляем, 
        // где currentPageInput.value - это номер страницы с 6 карточками, третье - параметр!
        ajax.open("GET", /*siteURL + */ "/modules/products/get-more.php?page=" + currentPageInput.value, false);   /*siteURL - на данный момент лишний, т.к. дублируется*/
        // отправляем запрос
        ajax.send();
        //получение номера страницы - "+" ставим перед currentPageInput.value, чтоб сделать тип данных целым числом
        currentPageInput.value = +currentPageInput.value + 1;
        // после отправки запроса мы получаем ajax.response = 6 следующих товаров
        // если товары закончились в БД и дальше страницы get-more.php?page="....  чтоб не создавались, то пишем условие на скрытие кнопки
        if (ajax.response == "") {
            btnShowMore.style.display = "none";
        }
        // получив данные мы можем привязать его в наш HTML путем добавления блока с еще 6 товарами
        var productsBloсk = document.querySelector("#products");
        // обьеденяем блок из 6 товаров с 6 последующими
        productsBloсk.innerHTML = productsBloсk.innerHTML + ajax.response;
        //===========================================
        //запускаем кликанье-добавление в корзину 
        // btnAddToTelezhka();
        // ===========================================
    }
}

//================================== это сложный вариан ===============
// создаем функцию, чтоб клик добавления был не только для первых 6, но для всех, после нажания Показать еще

// function btnAddToTelezhka() {
//     var btnAddTelezhka = document.querySelectorAll(".btn-add-telezhka");
//     for (let i = 0; i < btnAddTelezhka.length; i++) {
//         btnAddTelezhka[i].onclick = function () {
//             alert("Уверен?");
//         }
//     }
// };
// //запустили ее сразу для первых 6 товаров - это  - нужно вписать и в создание btnShowMore
// btnAddToTelezhka(); 

// проще вариант через onclick=function рядом с классом самой карточки

//добавляем товар в корзину
function addToTelega(btn) {

    //делаем ajax запрос на добавление в корзину
    var ajax = new XMLHttpRequest();
    // открытие запроса ajax происходит путем получения данных через метод "POST" и куда мы эти данные отправляем, 
    ajax.open("POST", "modules/telezhka/addtelezhka.php", false);
    //POST запрос через js -> ajax
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // отправляем запрос с id товара и data инфу
    ajax.send("id=" + btn.dataset.id);

    // декодирование методом JSON.parse
    var response = JSON.parse(ajax.response);

    //получить данные о добавлении
    var btnTelezhka = document.querySelector("#telezhka span");
    // выводим в span наше декодированное значение
    btnTelezhka.innerHTML = response.telezhka.length;

};

// удаление товара с корзины
function deleteProductTelezhka(obj, id) {
    // делаем ajax запрос на нашу страницу del_tel.php
    var ajax = new XMLHttpRequest();
    // открытие запроса ajax происходит путем получения данных через метод "POST" и куда мы эти данные отправляем, 
    // третье - параметр!
    ajax.open("POST", "/modules/telezhka/delTel.php", false);
    //POST запрос через js -> ajax
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // отправляем запрос
    ajax.send("id=" + id);
    //удаляем всю строку с товаром через ParentNode - обращение к родительному элементу
    obj.parentNode.parentNode.remove();
}

//  изменение количества одинаковых товаров и подсчет их стоимости

function countCost(obj, count, id) {
    console.dir(countCost);
    //запрос на страницу стоимости товара
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "modules/telezhka/count_cost.php", false);
    // устанавливает заголовок пост запроса, без него ajax не будет работать
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // передаем id товара для удаления
    ajax.send("count=" + count + "&id=" + id);
    // обращаемся к нужному элементу в таблице(costs) и выводим информацию 
    obj.parentNode.nextElementSibling.innerText = ajax.response;
}