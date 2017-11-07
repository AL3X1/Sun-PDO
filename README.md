

![sun](http://wallup.net/wp-content/uploads/2017/03/27/400560-digital_art-minimalism-simple_background-Sun-circle-lines-orange.jpg)


## SUN PDO

Библиотека, реализующая упрощенные запросы к базе через PDO

### Установка

**1. Подготовка к использованию**

Нужно лишь добавить эти строки в файл:
```
require("App/autoloader.php");
use App\QueryBuilder;
```
И создать экземпляр класса QueryBuilder с параметрами для входа.
```
$query = new QueryBuilder();
```
**2. Конфигурация**

Сконфигурировать библиотеку можно двумя способами:
1. В Config/DB.php

![config](https://pp.userapi.com/c638529/v638529826/4ce7c/wbMhXjv9AEQ.jpg)


2. Либо в конструкторе
```
$sun = new QueryBuilder($host, $db_name, $user_name, $password);
```

**3. Использование**

Простой запрос выборки:
```
$sun->select("*", "table")->execute;
```

Запрос выборки с привязкой значения:
```
$data = [
    "id" => 1
];

$sun->select("*", "table")->where($data)->execute();
```

Запрос вставки:
```
$data = [
    "username" => "Alex"
];

$sun->insert("table", $data)->execute();
```

Запрос обновления:
```
$data = [
    "username" => "Alex",
    "email" => "12345@gmail.com"
];

$sun->update("table", $data)->execute();
```

Запрос с лимитом:

```
$sun->select("*", "table")->limit(10)->execute();
```

Запрос удаления:

```
$sun->delete("table", ["username" => "Alex"])->execute();
```

**4. Дополнительно**

1. Вывод (fetch) данных
```

// Fetch
$fetch = $sun->select("*", "table")->limit(10)->execute()->fetch();

// FetchAll
$fetchAll = $sun->select("*", "table")->limit(10)->execute()->fetchAll();

// Дамп
$sun->debug($fetch);
$sun->debug($fetchAll);
```

2. Сортировка

```
$sun->select("*", "table")->orderBy("id", "DESC")->execute();
```

3. Ручной запрос

```
// execute() выполнять не нужно
$sun->query("INSERT INTO `table` (username, email) VALUES ('Alex', 'test@gmail.com')");
```

**Важные моменты**
1. Методы построены по типу построения SQL запроса, например:

```
// SELECT * FROM `table` WHERE `username` = 'Alex'
$sun->select("*", "table")->where(["username" => "Alex"])->execute();
```

2. Чтобы выполнить запрос, после построения SQL нужно выполнить метод execute();
если выполнить execute() при ручном запросе: ``` $sun->query()->execute; ``` - в базу запишется две записи.
