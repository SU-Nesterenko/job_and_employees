-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 04 2020 г., 17:03
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Name`, `Login`, `Password`) VALUES
(1, 'Vasya', 'vasya', '12345'),
(2, 'Kolya', 'Kolya', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nazvanie` tinytext,
  `salary` double DEFAULT NULL,
  `duty` int(11) DEFAULT NULL,
  `Opisanie` text,
  `dates` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `vacancy`
--

INSERT INTO `vacancy` (`ID`, `Nazvanie`, `salary`, `duty`, `Opisanie`, `dates`) VALUES
(1, 'Name1', 123, 2, 'Opisanie', '2020-05-04'),
(2, 'name2', 34555, 2, 'работа', '2020-05-04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
