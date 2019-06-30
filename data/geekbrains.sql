-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3305
-- Время создания: Июн 30 2019 г., 23:57
-- Версия сервера: 5.6.43
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geekbrains`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` varchar(32) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `session_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_product`, `name`, `quantity`, `price`, `session_id`) VALUES
(2, 5, 'майка', '1', '199', ''),
(3, 1, 'куртка', '1', '99', ''),
(4, 2, 'футболка', '1', '599', ''),
(6, 4, 'футболка', '1', '599', ''),
(8, 1, 'футболка', '1', '599', ''),
(9, 1, 'футболка', '1', '599', ''),
(11, 1, 'футболка', '1', '599', ''),
(12, 1, 'футболка', '1', '599', ''),
(13, 3, 'футболка', '1', '599', '4l5oj3us4d1q1tndfs2bo8bt841di0h5'),
(14, 6, 'футболка', '1', '599', '4l5oj3us4d1q1tndfs2bo8bt841di0h5'),
(15, 6, 'футболка', '1', '599', '4l5oj3us4d1q1tndfs2bo8bt841di0h5'),
(16, 1, 'футболка', '1', '599', '4l5oj3us4d1q1tndfs2bo8bt841di0h5'),
(24, 1, 'футболка', '1', '599', 'ou1htbke2kbk9qbftudh9atk3f07hu96'),
(25, 2, 'футболка', '1', '599', 'ou1htbke2kbk9qbftudh9atk3f07hu96'),
(26, 2, 'футболка', '1', '599', 'ou1htbke2kbk9qbftudh9atk3f07hu96'),
(27, 1, 'футболка', '1', '599', 'ou1htbke2kbk9qbftudh9atk3f07hu96'),
(28, 1, 'футболка', '1', '599', 'kge65nev1od9kngnel23e1m63f4o4m09'),
(29, 2, 'футболка', '1', '599', 'kge65nev1od9kngnel23e1m63f4o4m09');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'цветы'),
(2, 'мебель'),
(5, 'автотовары'),
(6, 'продукты');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL,
  `time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `time`) VALUES
(1, 'admin1', 'hello people!!', NULL),
(3, 'vasyr', 'i agrt', NULL),
(4, 'vasya', 'i agry', NULL),
(9, 'Гриша11', 'sdsdd22', NULL),
(11, 'АТРО', 'ТРОЯ', NULL),
(12, '111', '555', NULL),
(13, 'АЦК', 'КРУТяк', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `href` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `pop` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `href`, `name`, `pop`, `description`, `price`) VALUES
(1, '01.jpg', 'футболка', 34, 'хлопковая футболка премиум качества', '599'),
(2, '02.jpg', 'футболка', 5, 'хлопковая футболка премиум качества', '599'),
(3, '03.jpg', 'футболка', 3, 'хлопковая футболка премиум качества', '599'),
(4, '04.jpg', 'футболка', 3, 'хлопковая футболка премиум качества', '599'),
(5, '05.jpg', 'футболка', 15, 'хлопковая футболка премиум качества', '599'),
(6, '06.jpg', 'футболка', 3, 'хлопковая футболка премиум качества', '599');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(3) NOT NULL,
  `name` varchar(32) NOT NULL,
  `category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`) VALUES
(1, 'тюльпаны', 1),
(2, 'ландыши', 1),
(4, 'колбаса', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `tel` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `name`, `email`, `tel`, `status`) VALUES
(7, 'ou1htbke2kbk9qbftudh9atk3f07hu96', 'qqq', 'www', 999, 'новый'),
(8, 'kge65nev1od9kngnel23e1m63f4o4m09', 'www', 'zzz', 44444, 'новый');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`, `hash`) VALUES
(1, 'admin', 'admin', '$2y$10$almPDJhRodEKg0ibnflyLeVfAttjRP1dtaZv5NiQ0eEgkj5V2yVq6', '2884074145d18c4216da8b4.49179689'),
(2, 'лара', 'lar', 'lar22', ''),
(3, 'Алексей', 'alex', '3434', ''),
(4, 'jonh', 'jonh', 'qwert', ''),
(5, 'dart', 'dart', '555', ''),
(6, 'Гриша', 'html', 'grrrr', ''),
(7, 'виталий', 'tery', 'vit234', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
