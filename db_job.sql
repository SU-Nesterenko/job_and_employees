-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2020 г., 13:45
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_job`
--
CREATE DATABASE `db_job` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_job`;

-- --------------------------------------------------------

--
-- Структура таблицы `advertising`
--

CREATE TABLE IF NOT EXISTS `advertising` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nazvanie` varchar(255) NOT NULL,
  `Opisanie` text NOT NULL,
  `Tel` int(11) NOT NULL,
  `Data` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `advertising`
--

INSERT INTO `advertising` (`ID`, `Nazvanie`, `Opisanie`, `Tel`, `Data`) VALUES
(1, 'tttt', 'gghh', 12123, '2020-05-12'),
(2, 'fdfv', 'fdvdf', 12, '2020-05-11');

-- --------------------------------------------------------

--
-- Структура таблицы `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(200) NOT NULL,
  `dolzhnost` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `opit` varchar(200) NOT NULL,
  `zarplata` varchar(200) NOT NULL,
  `opisanie` varchar(2000) NOT NULL,
  `grafic` varchar(10) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `resume`
--

INSERT INTO `resume` (`id`, `fio`, `dolzhnost`, `date`, `opit`, `zarplata`, `opisanie`, `grafic`, `telephone`) VALUES
(1, 'Иванов', 'Сантехник', '2020-05-03', '2 года', '20 000 тыс р', 'Образование среднее-специальное г Челябинск', '5-2', '899999999'),
(2, 'Сидорова', 'Учитель', '2020-01-05', '10 лет', '30 тыс р', 'Опыт работы с начальными классами в г Челябинск, высшее образование', '5-2', '1111111');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` tinytext NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `RoleID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Name`, `Login`, `Password`, `isActive`, `RoleID`) VALUES
(1, 'Vasya', 'vasya', '12345', 0, 1),
(2, 'Kolya', 'Kolya', '12345', 1, 1),
(3, 'antonkornev', 'email@domain.com', '12345', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nazvanie` tinytext,
  `salary` double DEFAULT NULL,
  `duty` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `Opisanie` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`ID`, `Nazvanie`, `salary`, `duty`, `date`, `Opisanie`) VALUES
(2, 'name2', 34555, 2, '0000-00-00', 'работа'),
(3, 'Name155', 1235555, 2, '0000-00-00', 'Opisanie55'),
(4, 'аааа', 45555, 1, '0000-00-00', 'апапап'),
(5, 'аааа12', 45555, 1, '0000-00-00', 'апапап111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
