# What it is?

Это учебный проект "backend course 2020 - level 2" от **[Ш++](https://programming.org.ua)**.
Суть в разработке API, реализующего CRUD для ToDo приложения с регистрацией и авторизацией.
MySQL, router.php, CORS, SESSION, COOKIE, JSON, HTTP.
                                                         
## Realisation features
Точка входа - router.php

Для создания базы и таблиц нужно заполнить db_config.php и запустить db_create.php.

API должен работать с чужим **готовым фронтом** на разных серверах.
Фронт не мой, поэтому ссылку не дам.

Фронт имеет странный код в index.php.
Я добавил в login и logout фронта редирект на него с отправкой query string.
Код заменил на следующий:

```PHP
<?php

if (isset($_GET['auth'])) {
    if ($_GET['auth'] == 'true') {
        setcookie('auth', 'true');
        $_COOKIE['auth'] = 'true';
    } else {
        setcookie('auth', '', time() - 60);
        unset($_COOKIE['auth']);
    }
}

if (isset($_COOKIE['auth'])) {
    header('location: ToDov3/index.html');
} else {
    header('location: LoginToDo/login.html');
}
```
CORS настроил в конфигурации VirtualHost в секции Directory:
```
    Header set Access-Control-Allow-Origin "http://shpp_2.front"
    Header set Access-Control-Allow-Methods "GET, POST, OPTIONS, PUT, DELETE"
    Header set Access-Control-Allow-Headers "Content-Type"
    Header set Access-Control-Allow-Credentials "true"
```
## Личные заметки

Получить тело POST запроса:
file_get_contents('php://input')

После запроса на вставку INSERT сразу можно получить последний id:
$last_insert_id = mysqli_insert_id($link);

Ошибка при вставки переменной в SQL запрос. Кавычки нужны!!!
$query = "INSERT INTO todo (text, checked, user_id) VALUES ('$massage', 0, 1)";

SQL принимает и отдает true/false как 1/0. При заполнении true конвертирует в 1, а 0 в синтаксическую ошибку :)
Лечиться только заменой значений в PHP.

mysqli_query() Для запросов, без селектов возвращает успех/ошибку как true/false



