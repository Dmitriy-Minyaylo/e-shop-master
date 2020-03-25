-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 26 2019 г., 21:45
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop-master`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`) VALUES
(1, 'Рубашки', ''),
(2, 'Трусы', ''),
(3, 'Шапки на меху', ''),
(4, 'Ботинки', ''),
(9, 'Штаны военные', '');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `content`, `category_id`, `image`, `cost`) VALUES
(3, 'Трусы 1', 'Хорошие', 'Теплые с начесом', 2, '', '85'),
(18, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '35'),
(19, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '52'),
(20, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '59'),
(21, 'Берцы', 'Крутые', 'Красные', 4, '', '78'),
(22, 'Шапка', 'Серая', 'Чистый волк', 3, '', '54'),
(24, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '54'),
(25, 'Трусы 2', 'Хорошие', 'Теплые с начесом', 2, '', '4'),
(26, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '42'),
(27, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '45'),
(28, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '21'),
(29, 'Берцы', 'Крутые', 'Красные', 4, '', '56'),
(30, 'Шапка', 'Серая', 'Чистый волк', 3, '', '21'),
(31, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '45'),
(32, 'Трусы 3', 'Хорошие', 'Теплые с начесом', 2, '', '78'),
(33, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '61'),
(34, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '52'),
(35, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '42'),
(36, 'Берцы', 'Крутые', 'Красные', 4, '', '25'),
(37, 'Шапка', 'Серая', 'Чистый волк', 3, '', '74'),
(38, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '65'),
(39, 'Трусы 4', 'Хорошие', 'Теплые с начесом', 2, '', '74'),
(40, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '21'),
(41, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '37'),
(42, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '74'),
(43, 'Берцы', 'Крутые', 'Красные', 4, '', '53'),
(44, 'Шапка', 'Серая', 'Чистый волк', 3, '', '64'),
(45, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '35'),
(46, 'Трусы 5', 'Хорошие', 'Теплые с начесом', 2, '', '70'),
(47, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '60'),
(48, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '92'),
(49, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '32'),
(50, 'Берцы', 'Крутые', 'Красные', 4, '', '64'),
(51, 'Шапка', 'Серая', 'Чистый волк', 3, '', '27'),
(52, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '46'),
(53, 'Трусы 6', 'Хорошие', 'Теплые с начесом', 2, '', '35'),
(54, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '92'),
(55, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '38'),
(56, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '23'),
(57, 'Берцы', 'Крутые', 'Красные', 4, '', '89'),
(58, 'Шапка', 'Серая', 'Чистый волк', 3, '', '63'),
(59, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '56'),
(60, 'Трусы 7', 'Хорошие', 'Теплые с начесом', 2, '', '26'),
(61, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '78'),
(62, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '63'),
(63, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '74'),
(64, 'Берцы', 'Крутые', 'Красные', 4, '', '96'),
(65, 'Шапка', 'Серая', 'Чистый волк', 3, '', '89'),
(66, 'Шапка', 'Ушанка', 'Модная, потому что старая', 3, '', '55'),
(67, 'Трусы 8', 'Хорошие', 'Теплые с начесом', 2, '', '57'),
(68, 'Трусы', 'Норм', 'Не должно быть здесь пусто', 2, '', '54'),
(69, 'Безрукавка', 'Ващще', 'Почти рубашка', 1, '', '77'),
(70, 'Рубашка', 'Крутая', 'Здесь что то есть', 1, '', '75');

-- --------------------------------------------------------

--
-- Структура таблицы `telezhka`
--

CREATE TABLE `telezhka` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `data_create` datetime NOT NULL DEFAULT current_timestamp(),
  `adress` text NOT NULL,
  `telephone` text NOT NULL,
  `content` text NOT NULL,
  `name_user` varchar(250) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `telezhka`
--

INSERT INTO `telezhka` (`id`, `user_id`, `products`, `data_create`, `adress`, `telephone`, `content`, `name_user`, `status`) VALUES
(17, 2, '{\"telezhka\":[{\"product_id\":\"20\",\"count\":2},{\"product_id\":\"18\",\"count\":2},{\"product_id\":\"22\",\"count\":2},{\"product_id\":\"64\",\"count\":4}]}', '2019-12-24 15:23:35', 'Киев', '+38097-555-55-55', '321', 'Иван Иванович', 'Отправлено'),
(18, 4, '{\"telezhka\":[{\"product_id\":\"20\",\"count\":1},{\"product_id\":\"21\",\"count\":1},{\"product_id\":\"18\",\"count\":1},{\"product_id\":\"22\",\"count\":1},{\"product_id\":\"45\",\"count\":6}]}', '2019-12-24 15:25:12', 'Запорожье', '+38077-777-77-77', 'Попытка №2', 'Дмитрий Владимирович', 'Новый'),
(19, 6, '{\"telezhka\":[{\"product_id\":\"20\",\"count\":1},{\"product_id\":\"21\",\"count\":1},{\"product_id\":\"18\",\"count\":1},{\"product_id\":\"70\",\"count\":3},{\"product_id\":\"49\",\"count\":4},{\"product_id\":\"53\",\"count\":3}]}', '2019-12-24 18:31:11', 'Житомир', '+38095-123-45-67', '', 'Петр Петрович', 'Новый'),
(21, 14, '{\"telezhka\":[{\"product_id\":\"3\",\"count\":1,\"cost\":\"85\"},{\"product_id\":\"18\",\"count\":1,\"cost\":\"35\"},{\"product_id\":\"19\",\"count\":1,\"cost\":\"52\"},{\"product_id\":\"22\",\"count\":1,\"cost\":\"54\"},{\"product_id\":\"21\",\"count\":1,\"cost\":\"78\"},{\"product_id\":\"20\",\"count\":5,\"cost\":295}]}', '2019-12-26 14:13:41', 'retr', '+00454', '12345', 'erg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `telephone`, `password`, `confirm`, `email`, `verifided`) VALUES
(2, 'Иван', '+38097-555-55-55', '', '', '', 1),
(4, 'Дмитрий', '+38077-777-77-77', '', '', '', 0),
(6, 'Proverka@i.ua', '+38095-123-45-67', '', '', '', 0),
(19, 'creative.88', '', '827ccb0eea8a706c4c34a16891f84e7b', '1nHmDSjkzcqJYijT10Oo', 'creative@i.ua', 1),
(33, 'qwerty', '', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'cbWlihBJ3dOKBhDy64fF', 'qwerty@i.ua', 0),
(41, 'creative.88', '', '827ccb0eea8a706c4c34a16891f84e7b', 'foUkrG4lq4uPAonihH6N', 'creative.zp88@gmail.com', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telezhka`
--
ALTER TABLE `telezhka`
  ADD UNIQUE KEY `Инкримент` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `telezhka`
--
ALTER TABLE `telezhka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
