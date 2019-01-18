-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 18 2019 г., 18:18
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `DBblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `blogId` int(10) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `homePage` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `userIP` varchar(255) NOT NULL,
  `userBrowser` varchar(255) NOT NULL,
  `blogTitle` varchar(255) NOT NULL,
  `blogContent` text NOT NULL,
  `blogTags` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`blogId`, `userName`, `homePage`, `email`, `userIP`, `userBrowser`, `blogTitle`, `blogContent`, `blogTags`, `created_at`) VALUES
(1, 'Pluton', 'https://vk.com/tviik', '1@mail.com', '127.0.0.1', 'Chrome', 'Комментарий', '<p>Комментарий</p>\r\n', 'pluton tag comment', '2019-01-18 17:47:38'),
(2, 'mars', 'https://vk.com/tviik', '2@mail.com', '127.0.0.1', 'Chrome', 'Комментарий', '<h2 style=\"font-style:italic;\"><strong>Комментарий</strong></h2>\r\n', 'mars Comment tag', '2019-01-18 17:49:02'),
(3, 'moon', 'https://vk.com/tviik', '2@mail.com', '127.0.0.1', 'Chrome', 'Comment', '<p>Comment</p>\r\n', 'Comment', '2019-01-18 17:55:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
