-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 24 2022 г., 00:26
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travel2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `client code` int(10) UNSIGNED NOT NULL,
  `fio` text NOT NULL,
  `date of birth` date NOT NULL,
  `phone number` bigint(11) NOT NULL,
  `passport number` bigint(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`client code`, `fio`, `date of birth`, `phone number`, `passport number`) VALUES
(1, 'Калинин А.А.', '2002-03-01', 89319663839, 2111633789),
(2, 'Соколов А.В.', '2000-05-24', 89211667739, 3161733989),
(3, 'Девайкин В.А.', '2001-10-04', 89217534839, 8981644754),
(4, 'Иванов В.В.', '2002-01-01', 89319663839, 2111633789),
(6, 'Васильева Е.А.', '1995-01-01', 89216754342, 4329714266),
(8, 'Добрынин В.П.', '1931-02-21', 89213456342, 4329714245),
(12, 'Иванова Л.П.', '2001-01-05', 89213456243, 4317178652),
(11, 'Владимиров Д.Н.', '2000-03-01', 89315463765, 2111633456),
(13, 'Мелкина В.П.', '1988-01-01', 89213456345, 2111633789);

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `contract code` int(10) UNSIGNED NOT NULL,
  `tour code` int(10) UNSIGNED NOT NULL,
  `date of contract` date NOT NULL,
  `client code` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`contract code`, `tour code`, `date of contract`, `client code`) VALUES
(1, 1, '2022-03-21', 1),
(2, 2, '2022-03-23', 3),
(3, 3, '2022-03-28', 4),
(4, 4, '2022-04-01', 6),
(5, 5, '2022-04-02', 2),
(6, 6, '2022-04-05', 3),
(7, 7, '2022-04-20', 8),
(8, 4, '2022-04-21', 11),
(9, 6, '0222-05-08', 4),
(10, 9, '2022-05-09', 11),
(11, 8, '2022-05-12', 3),
(12, 10, '2022-05-12', 1),
(13, 11, '2022-05-12', 11),
(14, 4, '2022-05-13', 1),
(15, 20, '2022-05-21', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `tour`
--

CREATE TABLE `tour` (
  `tour code` int(10) UNSIGNED NOT NULL,
  `tour start date` date NOT NULL,
  `tour end date` date NOT NULL,
  `country` text NOT NULL,
  `hotel` text NOT NULL,
  `tour operator code` int(10) UNSIGNED NOT NULL,
  `tour price` decimal(10,0) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tour`
--

INSERT INTO `tour` (`tour code`, `tour start date`, `tour end date`, `country`, `hotel`, `tour operator code`, `tour price`) VALUES
(1, '2022-04-29', '2022-05-10', 'Australia', 'The Langham', 2, '497000'),
(2, '2022-07-30', '2022-08-07', 'Singapore', 'Orchard Grand Court\r\n', 1, '82540'),
(3, '2022-09-08', '2022-09-30', 'USA', 'La Quinta by Wyndham Madera', 3, '251712'),
(4, '2022-11-15', '2023-11-25', 'Russia', 'Империя-Сити', 1, '75000'),
(5, '2022-05-20', '2022-05-25', 'Malta', 'Sweet Life Gozo', 2, '106374'),
(6, '2022-06-15', '2022-06-27', 'Indonesia', 'The Mudru Resort', 3, '35538'),
(7, '2022-05-20', '2022-05-27', 'Египет', 'STELLA DI MARE GARDEN RESORT & SPA 5*', 4, '125000'),
(8, '2022-06-01', '2022-06-18', 'Испания', 'Radisson Blu 1882 Hotel', 6, '142000'),
(9, '2022-05-19', '2022-05-31', 'Италия', 'hotel Lella', 3, '82000'),
(10, '2022-07-01', '2022-07-06', 'Египет', 'GRAND MAKADI 5*', 7, '89000'),
(11, '2022-07-01', '2022-07-15', 'Египет', 'STELLA DI MARE GARDEN RESORT & SPA 5*', 4, '56000'),
(20, '2022-05-22', '2022-05-22', 'Египет', 'Graviti', 4, '68000');

-- --------------------------------------------------------

--
-- Структура таблицы `tour operators`
--

CREATE TABLE `tour operators` (
  `tour operator code` int(10) UNSIGNED NOT NULL,
  `tour operator` text NOT NULL,
  `phone number` bigint(11) NOT NULL,
  `commission percentage` int(2) UNSIGNED NOT NULL,
  `website` text NOT NULL,
  `legal entity` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tour operators`
--

INSERT INTO `tour operators` (`tour operator code`, `tour operator`, `phone number`, `commission percentage`, `website`, `legal entity`) VALUES
(1, 'Avia-Sky', 89119753239, 5, 'www.avia-sky.ru', 'OOO \"Авиа-Скай\"'),
(2, 'Sky Moon', 89312335766, 15, 'www.skymoon.ru', 'ООО \"Скай Мун\"'),
(3, 'Safe Flights', 89215553811, 10, 'www.safe-flights.ru', 'ООО \"Сейф Флайтс\"'),
(4, 'Библиоглобус', 2111633789, 6, 'www.bgoperator.ru', ' ООО «Библио-Глобус Туроператор»'),
(6, 'Санмар', 89215436576, 8, 'www.sunmar.ru', 'ООО «Отдых на море»'),
(7, 'Пегас туристик', 88127854635, 9, 'https://pegast.ru', ' ООО \"Пегас Туристик\"');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client code`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract code`),
  ADD KEY `tour code` (`tour code`) USING BTREE,
  ADD KEY `client code` (`client code`) USING BTREE;

--
-- Индексы таблицы `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour code`),
  ADD KEY `tour operator code` (`tour operator code`);

--
-- Индексы таблицы `tour operators`
--
ALTER TABLE `tour operators`
  ADD PRIMARY KEY (`tour operator code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `client code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `contract code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tour`
--
ALTER TABLE `tour`
  MODIFY `tour code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `tour operators`
--
ALTER TABLE `tour operators`
  MODIFY `tour operator code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
