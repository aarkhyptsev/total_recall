--
-- Создание таблицы `books_authors`
--

CREATE TABLE `books_authors`
(
    `book_id`   INT NOT NULL,
    `author_id` INT NOT NULL,
    FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
    FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`)
) ENGINE = InnoDB
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

--
-- Заполнение `books_authors` из `books` и `authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`)
SELECT `book_id`, `authors`.`author_id`
FROM `books`
         LEFT JOIN `authors` ON `books`.`book_author_1` = `authors`.`author_name`
UNION
SELECT `book_id`, `authors`.`author_id`
FROM `books`
         LEFT JOIN `authors` ON `books`.`book_author_2` = `authors`.`author_name`
WHERE `books`.`book_author_2` IS NOT NULL
UNION
SELECT `book_id`, `authors`.`author_id`
FROM `books`
         LEFT JOIN `authors` ON `books`.`book_author_3` = `authors`.`author_name`
WHERE `books`.`book_author_3` IS NOT NULL;