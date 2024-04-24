--
-- Создание таблицы `authors`
--

CREATE TABLE `authors`
(
    `author_id`   INT          NOT NULL AUTO_INCREMENT,
    `author_name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`author_id`)
) ENGINE = InnoDB
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

--
-- Заполнение `authors` на основе `books`
--

INSERT INTO `authors` (`author_name`)
SELECT DISTINCT `author_name`
FROM (
         SELECT COALESCE(`book_author_1`, '') AS `author_name` FROM `books`
         UNION
         SELECT COALESCE(`book_author_2`, '') AS `author_name` FROM `books`
         UNION
         SELECT COALESCE(`book_author_3`, '') AS `author_name` FROM `books`
     ) AS `subquery`
WHERE `author_name` <> '';