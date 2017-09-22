<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 15.09.2017
 * Time: 15:47
 */

require("App/loading.php");

use App\QueryBuilder;
$query = new QueryBuilder();

$arr = array(
    "username" => "Alex123456",
    "email" => "helloworld@gmail.com"
);

//$query->insert("users", $arr)->send();
$select = $query->select("*", "users")->order("id", "DESC")->send()->fetchAll();
$query->debug($select);
