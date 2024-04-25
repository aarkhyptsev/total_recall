--
-- Удаление колонок авторов из `books`
--

ALTER TABLE books
    DROP COLUMN book_author_1,
    DROP COLUMN book_author_2,
    DROP COLUMN book_author_3;
