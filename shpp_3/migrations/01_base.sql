--
-- Таблица `books`
--

CREATE TABLE `books`
(
    `book_id`       int AUTO_INCREMENT NOT NULL,
    `book_name`     varchar(100)       NOT NULL,
    `book_img`      varchar(20)        NOT NULL,
    `book_author_1` varchar(100)       NOT NULL,
    `book_author_2` varchar(50)                 DEFAULT NULL,
    `book_author_3` varchar(50)                 DEFAULT NULL,
    `book_click`    int                NOT NULL DEFAULT '0',
    `book_year`     int                NOT NULL DEFAULT '2000',
    `delete_at`     timestamp          NULL     DEFAULT NULL,
    PRIMARY KEY (book_id)
) ENGINE = InnoDB
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

--
-- Данные таблицы `books`
--

INSERT INTO `books` (`book_name`, `book_img`, `book_author_1`, `book_author_2`, `book_author_3`,
                     `book_click`, `book_year`, `delete_at`)
VALUES ('СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА', '22.jpg', 'Андрей Богуславский', NULL, NULL, 17, 2000, NULL),
       ('Программирование на языке Go!', '23.jpg', 'Марк Саммерфильд', NULL, NULL, 11, 2000, NULL),
       ('Python и анализ данных', '26.jpg', 'Уэс Маккинни', NULL, NULL, 13, 2000, NULL),
       ('Thinking in Java (4th Edition)', '27.jpg', 'Брюс Эккель', NULL, NULL, 9, 2000, NULL),
       ('Computer Coding for Kid', '36.jpg', 'Джон Вудкок', NULL, NULL, 8, 2000, NULL),
       ('Practical Vim', '48.jpg', 'Дрю Нейл', NULL, NULL, 0, 2000, NULL),
       ('Head First Ruby', '47.jpg', 'Джей Макгаврен', NULL, NULL, 0, 2000, NULL),
       ('NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence', '46.jpg', 'Мартин Фаулер',
        'Прамодкумар Дж. Садаладж', NULL, 0, 2000, NULL),
       ('Swift Pocket Reference: Programming for iOS and OS X', '45.jpg', 'Энтони Грей', NULL, NULL, 0, 2000, NULL),
       ('Clean Code: A Handbook of Agile Software Craftsmanship', '44.jpg', 'Роберт Мартин', NULL, NULL, 0, 2000,
        NULL),
       ('Android для разработчиков', '43.jpg', 'Пол Дейтел', 'Харви Дейтел', NULL, 0, 2000, NULL),
       ('Адаптивный дизайн. Делаем сайты для любых устройств', '42.jpg', 'Тим Кедлек', NULL, NULL, 0, 2000, NULL),
       ('InDesign CS6', '41.jpg', 'Александр Сераков', NULL, NULL, 0, 2000, NULL),
       ('Sketching User Experiences: The Workbook', '40.jpg', 'Сет Гринберг', NULL, NULL, 2, 2000, NULL),
       ('The Internet of Things', '39.jpg', 'Сэмюэл Грингард', NULL, NULL, 0, 2000, NULL),
       ('Программирование микроконтроллеров для начинающих и не только', '38.jpg', 'А. Белов', NULL, NULL, 0, 2000,
        NULL),
       ('Exploring Arduino: Tools and Techniques for Engineering Wizardry', '37.jpg', 'Джереми Блум', NULL, NULL, 0,
        2000, NULL),
       ('Статистический анализ и визуализация данных с помощью R', '35.jpg', 'Сергей Мастицкий', NULL, NULL, 0,
        2000, NULL),
       ('PHP and MySQL Web Development', '34.jpg', 'Люк Веллинг', NULL, NULL, 0, 2000, NULL),
       ('SQL: The Complete Referenc', '33.jpg', 'Джеймс Р. Грофф', NULL, NULL, 1, 2000, NULL),
       ('Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Pri', '32.jpg',
        'Гэри Маклин Холл', NULL, NULL, 0, 2000, NULL),
       ('JavaScript Pocket Reference', '31.jpg', 'Дэвид Флэнаган', NULL, NULL, 0, 2000, NULL),
       ('Introduction to Algorithms', '29.jpg', 'Томас Кормен', 'Чарльз Лейзерсон', 'Рональд Ривест', 0, 2000,
        NULL),
       ('Толковый словарь сетевых терминов и аббревиатур', '25.jpg', 'М., Вильямс', NULL, NULL, 0, 2000, NULL);

--
-- Таблица versions --
--

CREATE TABLE IF NOT EXISTS `versions`
(
    `id`      int(10)      NOT NULL AUTO_INCREMENT,
    `name`    varchar(255) NOT NULL,
    `created` timestamp DEFAULT current_timestamp,
    PRIMARY KEY (id)
)
    ENGINE = innodb
    CHARACTER SET utf8
    COLLATE utf8_general_ci;