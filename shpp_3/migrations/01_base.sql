-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Апр 23 2024 г., 15:16
-- Версия сервера: 8.3.0
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shpp_3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books`
(
    `book_id`       int                                                           NOT NULL,
    `book_name`     varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `book_img`      varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci  NOT NULL,
    `book_author_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `book_author_2` varchar(50)                                                            DEFAULT NULL,
    `book_author_3` varchar(50)                                                            DEFAULT NULL,
    `book_click`    int                                                           NOT NULL DEFAULT '0',
    `book_year`     int                                                           NOT NULL DEFAULT '2000'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_img`, `book_author_1`, `book_author_2`, `book_author_3`,
                     `book_click`, `book_year`)
VALUES (1, 'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА', '22.jpg', 'Андрей Богуславский', NULL, NULL, 17, 2000),
       (2, 'Программирование на языке Go!', '23.jpg', 'Марк Саммерфильд', NULL, NULL, 10, 2000),
       (5, 'Python и анализ данных', '26.jpg', 'Уэс Маккинни', NULL, NULL, 13, 2000),
       (6, 'Thinking in Java (4th Edition)', '27.jpg', 'Брюс Эккель', NULL, NULL, 9, 2000),
       (16, 'Computer Coding for Kid', '36.jpg', 'Джон Вудкок', NULL, NULL, 8, 2000),
       (37, 'Practical Vim', '48.jpg', 'Дрю Нейл', NULL, NULL, 0, 2000),
       (38, 'Head First Ruby', '47.jpg', 'Джей Макгаврен', NULL, NULL, 0, 2000),
       (39, 'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence', '46.jpg', 'Мартин Фаулер',
        'Прамодкумар Дж. Садаладж', NULL, 0, 2000),
       (40, 'Swift Pocket Reference: Programming for iOS and OS X', '45.jpg', 'Энтони Грей', NULL, NULL, 0, 2000),
       (41, 'Clean Code: A Handbook of Agile Software Craftsmanship', '44.jpg', 'Роберт Мартин', NULL, NULL, 0, 2000),
       (42, 'Android для разработчиков', '43.jpg', 'Пол Дейтел', 'Харви Дейтел', NULL, 0, 2000),
       (43, 'Адаптивный дизайн. Делаем сайты для любых устройств', '42.jpg', 'Тим Кедлек', NULL, NULL, 0, 2000),
       (44, 'InDesign CS6', '41.jpg', 'Александр Сераков', NULL, NULL, 0, 2000),
       (45, 'Sketching User Experiences: The Workbook', '40.jpg', 'Сет Гринберг', NULL, NULL, 2, 2000),
       (46, 'The Internet of Things', '39.jpg', 'Сэмюэл Грингард', NULL, NULL, 0, 2000),
       (47, 'Программирование микроконтроллеров для начинающих и не только', '38.jpg', 'А. Белов', NULL, NULL, 0, 2000),
       (48, 'Exploring Arduino: Tools and Techniques for Engineering Wizardry', '37.jpg', 'Джереми Блум', NULL, NULL, 0,
        2000),
       (49, 'Статистический анализ и визуализация данных с помощью R', '35.jpg', 'Сергей Мастицкий', NULL, NULL, 0,
        2000),
       (50, 'PHP and MySQL Web Development', '34.jpg', 'Люк Веллинг', NULL, NULL, 0, 2000),
       (51, 'SQL: The Complete Referenc', '33.jpg', 'Джеймс Р. Грофф', NULL, NULL, 1, 2000),
       (52, 'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Pri', '32.jpg',
        'Гэри Маклин Холл', NULL, NULL, 0, 2000),
       (53, 'JavaScript Pocket Reference', '31.jpg', 'Дэвид Флэнаган', NULL, NULL, 0, 2000),
       (54, 'Introduction to Algorithms', '29.jpg', 'Томас Кормен', 'Чарльз Лейзерсон', 'Рональд Ривест', 0, 2000),
       (55, 'Толковый словарь сетевых терминов и аббревиатур', '25.jpg', 'М., Вильямс', NULL, NULL, 0, 2000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
    ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
    MODIFY `book_id` int NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
-- Таблица versions --
create table if not exists `versions`
(
    `id`      int(10) unsigned not null auto_increment,
    `name`    varchar(255)     not null,
    `created` timestamp default current_timestamp,
    primary key (id)
)
    engine = innodb
    auto_increment = 1
    character set utf8
    collate utf8_general_ci;