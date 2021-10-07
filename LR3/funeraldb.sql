-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 07 2021 г., 20:57
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `funeraldb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `deadpeople`
--

CREATE TABLE `deadpeople` (
  `id` int NOT NULL,
  `imgsource` varchar(45) NOT NULL DEFAULT 'imgnotfound.png',
  `firstsecondthird_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_place` int NOT NULL,
  `date_and_time` text NOT NULL,
  `num_audience` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `deadpeople`
--

INSERT INTO `deadpeople` (`id`, `imgsource`, `firstsecondthird_name`, `id_place`, `date_and_time`, `num_audience`) VALUES
(1, 'oneuser_place2.jpg', 'Иванова Мария Анатольевна', 1, '13.09.2019<br>\r\n23:40', 9),
(2, 'oneuser_place3.jpg', 'Горшков Владимир Иванович', 1, '15.12.2000<br>13:40', 12),
(3, 'oneuser_place4.jpg', 'Карнавалов Игорь Артёмович', 1, '12.12.2010<br>18:32', 6),
(4, 'oneuser_place5.jpg', 'Иванова Коралина Демьяновна', 1, '11.01.2019<br>\r\n13:00', 19),
(5, 'oneuser_place6.jpg', 'Сидоров Валерий Антонович', 1, '12.12.2012<br>\r\n12:12', 10),
(6, 'oneuser_place7.jpg', 'Евдокимова Валерия Игнатьевна', 1, '10.09.2005<br>\r\n14:21', 5),
(7, 'uneuser.jpg', 'Ельшанов Борис Дмитриевич', 1, '13.05.2006<br>\r\n19:40', 11),
(8, 'multiusers2.jpg', 'Иванова Алина Борисовна,<br>\r\nКарнавалов Андрей Артёмович,<br>\r\nБурятина Мария Анатольевна,<br>\r\nБоголюбова Любовь Валерьевна', 2, '13.12.2009<br>\r\n11:11', 28),
(9, 'multiusers_place.jpg', 'Ибрагимова Карнелия Марковна,<br>\r\nТертычный Владимир Корнеевич,<br>\r\nИгнатьевна Марина Викторовна<br>', 2, '19.09.2021<br>\r\n18:16', 22),
(10, 'memorialuser.jpg', 'Гагарин Никита Борисович', 4, '12.12.2002<br>\r\n13:50', 15),
(11, 'memorial_place2.jpg', 'Шаляпин Константин Никитович', 4, '19.08.2007<br>\r\n09:43', 12),
(12, 'memorial_place.jpg', 'Маск Корней Прохорович', 4, '11.11.2011<br>\r\n19:32', 16),
(13, 'family_place5.jpg', 'Шишкина Алина Павловна,<br>\r\nШишкин Бернулий Константинович', 3, '11.03.2008<br>\r\n12:51', 19),
(14, 'family_place4.jpg', 'Прокопов Иларион Викторович,<br>\r\nПрокопова Юлия Владимировна', 3, '19.08.2015<br>\r\n17:54', 18),
(15, 'family_place3.jpg', 'Иванов Борис Степанович,<br>\r\nИванова Екатерина Павловна', 3, '16.04.2010<br>19:31', 11),
(16, 'family_place2.jpg', 'Шаров Павел Андреевич,<br>Шарова Полина Семёновна', 3, '19.07.2005<br>\r\n19:58', 20),
(17, 'family_place.jpg', 'Синевалова Елизавета Павловна,<br>\r\nСиневалов Александр Владимирович', 3, '13.01.2001<br>\r\n10:21', 13),
(18, 'Columbarium2.jpg', 'Шаров Семён Павлович', 5, '10.10.2006<br>\r\n11:17', 4),
(19, 'Columbarium4.jpg', 'Серпова Камила Абдулаева', 5, '20.09.2019<br>\r\n11:12', 7),
(20, 'columbarium1.jpg', 'Александров Александр Александрович', 5, '21.12.2014<br>\r\n11:59', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name`) VALUES
(1, 'Одноместное'),
(2, 'Многоместное'),
(3, 'Семейное'),
(4, 'Мемориальное'),
(5, 'Колумбарийное');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `firsecthirname` text NOT NULL,
  `blood_group` int NOT NULL,
  `rhfactor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `firsecthirname`, `blood_group`, `rhfactor`) VALUES
(36, 'simon@f8', 'f034c92d4fa9a9ff82fe730b37247a85', 'dfgdfgh dtghdfg dfgdg', 2, 'wefsef'),
(37, 'simon@mail', '2f7bdf524339acdd4b5108606d2efb3f', 'dfgdfgh dtghdfg dfgdg', 1, 'wefsef'),
(39, 'simon@f222333.com', '9476dc91bcd91f35c691c5eb28aef3dd', 'dfgdfgh dtghdfg dfgdg', 3, 'положительный'),
(40, 'simon@f222444.com', 'f034c92d4fa9a9ff82fe730b37247a85', 'dfgdfgh dtghdfg dfgdg', 3, 'положительный'),
(41, 'simon@f222433.com', '2f7bdf524339acdd4b5108606d2efb3f', 'wefwe wefwe weww', 1, 'Положительный'),
(42, 'simon@f222777.com', '510bea3ceba1544af35945310442140f', 'fdgdfg dfgd fg dfgdr', 4, 'Положительный'),
(43, 'simon@f111222.ru', 'c951677ce1a5c469a37088ed72d84e26', 'dfgdfgh dtghdfg dfgdg', 4, 'положительный'),
(44, 'simon@s222111.com', '6951cf53c541ed677a0d47762390c67b', 'fdgdfg dfgd fg dfgdr', 4, 'Положительный'),
(45, 'simon123@gmail.com', 'd071052851ad68dcf249468627145623', 'dfgdfgh dtghdfg dfgdg', 3, 'положительный'),
(46, 'polukhin.semen.80@mail.ru', 'd071052851ad68dcf249468627145623', 'Полухин Семён Андреевич', 3, 'положительный'),
(47, 'simon@mail.ru', 'd071052851ad68dcf249468627145623', 'dfgdfgh dtghdfg dfgdg', 3, 'положительный'),
(48, 'simon@f.ru', 'e8b823c567cc15faea2b9addda5c82fa', 'dfgdfgh dtghdfg dfgdg', 3, 'положительный'),
(49, 'simon@gmail.com', '7913958fd64f5f0c7ad3bc8fafbb12a8', 'Полухин Семён Андреевич', 3, 'положительный'),
(50, 'polukhin.semen.99@mail.ru', 'd071052851ad68dcf249468627145623', 'Полухин Семён Андреевич', 3, 'положительный'),
(51, 'polukhin.semen.96@mail.ru', 'd071052851ad68dcf249468627145623', 'Полухин Семён Андреевич', 3, 'положительный'),
(52, 'polukhin.semen.100@mail.ru', 'd071052851ad68dcf249468627145623', 'Полухин Семён Андреевич', 3, 'положительный');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `deadpeople`
--
ALTER TABLE `deadpeople`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_1` (`id_place`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
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
-- AUTO_INCREMENT для таблицы `deadpeople`
--
ALTER TABLE `deadpeople`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `deadpeople`
--
ALTER TABLE `deadpeople`
  ADD CONSTRAINT `foreign_key_1` FOREIGN KEY (`id_place`) REFERENCES `places` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
