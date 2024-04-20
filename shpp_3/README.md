# What it is?

Это учебный проект "backend course 2020 - level 3" от **[Ш++](https://programming.org.ua)**.
Суть в написании приложения-библиотеки на самописном фреймворке. 
Templates, router, MVC, migrations, bootstrap, hasMany / hasOne, basic auth, cron.

## Realisation features

app/config/constants.php - константы для подключения к базе данных
и управления пагинацией на страницах пользователя и админа.

User pages - подключил готовую верстку страницы списка книг и страницу отдельной книги.
Поскольку задача построить безаджаксовый сайт, все "лишнее" из верстки я удалил.
libs.min.css и style.css подключены без каких-либо изменений.

Admin page - сверстал на bootstrap.

Basic auth - залогиниться не проблема, проблема разлогиниться.
Найдено чудесное решение, работающее без закрывания рестарта Firefox. Нажатие ссылки **Exit** должно вернуть:
```HTML
<div>You have been logged out. Redirecting to home...</div>    

<script>
    var XHR = new XMLHttpRequest();
    XHR.open("GET", "/Home/MyProtectedPage", true, "no user", "no password");
    XHR.send();

    setTimeout(function () {
        window.location.href = "/";
    }, 3000);
</script>
```

Popup - в уже предоставленном с фронтом libs.min.css есть классы для модальных окон.
Нужно либо писать свой CSS под свои классы, либо использовать существующие.
Я выбрал второе, а недостающие свойства включил в html-теги моего попапа.

Click count - скрипт лежит в click.js, которым я заменил предоставленный book.js.
В нем же код для отображения модального окна.

Exeptions - ошибки обрабатывает статический метод ResponseHandler::sendError.
Он возвращает статус-код ошибки и JSON с ее описанием.
С msqli мне не удалось перехватить ошибки подключения к базе данных,
поэтому я переписал запросы с PDO и все заработало как надо.
Я перехватываю ошибку подключения к базе данных, ввода неправильного URI,
записи файла обложки книги.

## Personal notes
Годный материал по написанию простого MVC фреймворка
[здесь](https://reintech.io/blog/building-php-mvc-framework-from-scratch)
и [здесь](https://code.mu/ru/php/book/oop/mvc/framework/intro/).

