<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15.09.2017
 * Time: 15:47
 */

require("App/autoloader.php");

use App\QueryBuilder;
$query = new QueryBuilder();

$arr = array(
    "username" => "Inozemtsev",
    "email" => "inzmtsv.alx@gmail.com"
);

//$query->insert("users", $arr)->send();
//$select = $query->select("*", "users")->limit(2);
$select = $query->select("*", "users")->execute()->fetchAll();
$select = $query->query("INSERT INTO `users` (username, email) VALUES ('Alex', 'test@gmail.com')")->execute();

//$query->insert("users", ["username" => "Alexxxxxx", "email" => "trololo@mail.ru"])->execute();
//$query->delete("users", "username='Inozemtsev'")->execute();


$query->debug($select);
//$query->debug($delete);
