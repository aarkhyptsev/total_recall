# What it is?

Это учебный проект "backend course 2020 - level 3" от **[Ш++](https://programming.org.ua)**.
Суть в написании приложения-библиотеки на самописном фреймворке. 
Templates, router, MVC, migrations, bootstrap, hasMany / hasOne, basic auth, cron.

## Realisation features

Basic auth - залогиниться не проблема, проблема разлогиниться.
Через 2 часа поисков найдено решение. Нажатие ссылки **Exit** должно вернуть:
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
## Personal notes
Годный материал по написанию простого MVC фреймворка
[здесь](https://reintech.io/blog/building-php-mvc-framework-from-scratch)
и [здесь](https://code.mu/ru/php/book/oop/mvc/framework/intro/).

