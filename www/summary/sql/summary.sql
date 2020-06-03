-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2020 г., 10:53
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

-- --------------------------------------------------------

--
-- Структура таблицы `summary`
--

CREATE TABLE IF NOT EXISTS `summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `salary` varchar(10000) DEFAULT NULL,
  `mode` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `summary`
--

INSERT INTO `summary` (`id`, `title`, `description`, `salary`, `mode`) VALUES
(8, 'Сварщик', 'Тестовое описание 2				', '25,000.00', 1),
(9, 'Тест 2', 'Тест			', '25,000.00', 3),
(10, 'Тест', 'Тест', '1,000.00', 2),
(11, 'Тест', 'Тест', '1,000.00', 2),
(12, 'Тест', 'Тест', '11,111.11', 3),
(13, 'Тест', 'Тест			', '1,000.00', 1),
(14, 'Тест', 'Тест', '1,000.00', 1),
(17, '', '', '', 0),
(18, '', '', '', 0),
(19, '', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
