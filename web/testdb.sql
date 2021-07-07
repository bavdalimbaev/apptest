-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 07 2021 г., 09:54
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testtwo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report` text NOT NULL,
  `status` enum('show','hide') NOT NULL DEFAULT 'show',
  `dateadd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `report`, `status`, `dateadd`) VALUES
(22, 1, 'salam', 'show', '2021-07-05 12:33:28'),
(23, 1, 'salam', 'hide', '2021-07-05 12:33:46'),
(24, 2, 'Vsem Privet!', 'show', '2021-07-05 13:22:37'),
(25, 2, 'hi', 'hide', '2021-07-05 13:22:50'),
(26, 4, 'ya admin', 'show', '2021-07-05 13:57:23'),
(27, 4, 'kak dela', 'show', '2021-07-05 13:57:34'),
(28, 1, 'novost dnya', 'show', '2021-07-05 14:58:32'),
(29, 1, 'admin udalil moy message', 'hide', '2021-07-05 14:58:56'),
(30, 2, 'hi admin, ty udalil moyu soobweniyu', 'show', '2021-07-05 15:04:13'),
(31, 4, 'да, удалил', 'show', '2021-07-05 15:10:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `name` char(155) NOT NULL,
  `email` char(155) NOT NULL,
  `password` char(100) NOT NULL,
  `role` enum('admin','user','guest') NOT NULL DEFAULT 'user',
  `dateadd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `auth_key`, `name`, `email`, `password`, `role`, `dateadd`) VALUES
(1, 'fsmTDjCzI4FnmTaRO5xL-xy9aywqIJeC', 'movie', 'b@b.ru', '$2y$13$hdAOp1zRUIORybAyz.GZt.M/T1bE9tnTQGb6R/.I7hLPTffBnDSI6', 'user', '2021-07-05 10:25:45'),
(2, 'UzUw0S7BgmCI9Ch5hApQOB7PnMQR9QJo', 'series', 'b@b.rus', '$2y$13$rsqjZPCz1xnUT9EPJ7Z2RexfNtb.MTnvS0hgoUQdO/7GF0pib37gq', 'user', '2021-07-05 10:33:03'),
(3, '4MC1wYUVej8Xwe5y8vqHEog-jHJsYz-L', 'K&S Musics', 'b@b.russ', '$2y$13$lKcMD6xWmkBOgWybHyWS.ufMRTQA/b6f3SE.MFufrW5b67qG1vWRu', 'user', '2021-07-05 10:36:06'),
(4, '8SorWv9i4sk9zfwD3Tkagf5FlR5aqHIV', 'Admin', 'admin@admin.ru', '$2y$13$2P00a0uyuEN00H7s5NwcoOn.Fx.rzj.jcqDiiBtEjg.AZmsz1hFCe', 'admin', '2021-07-05 13:47:27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_message` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `user_message` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
