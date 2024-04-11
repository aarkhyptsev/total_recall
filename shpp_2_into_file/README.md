# What it is?
Это учебный проект "backend course 2020 - level 2" от **[Ш++](https://programming.org.ua)**.
Суть в разработке API, реализующего CRUD для ToDo приложения с хранением записей в файле.
JSON, HTTP, Postman.

## Realisation features
Проблема прав доступа для file_put_contents():
```bash
chmod 777 id.txt
chmod 777 todo.json
```

При использовании ключей в foraech() в массиве появляются именованные ключи, которых не было.
Соответственно они попадают при кодировании в json:
array_values()

## Personal notes
Получить тело POST запроса:
file_get_contents('php://input')