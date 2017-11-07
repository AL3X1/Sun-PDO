## SUN PDO

Библиотека, реализующая упрощенные запросе к базе через PDO

### Установка

**1. Подготовка к использованию**

Нужно лишь добавить эти строки в файл:
```
require("App/autoloader.php");
use App\QueryBulder;
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
$sun->select("*", "table")->where($data)->execute;
```

Запрос вставки:
```
$data = [
    "username" => "Alex"
];
$sun->insert("table", $data)->execute();
```
