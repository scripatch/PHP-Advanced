<?php

define('DIR_ROOT', dirname($_SERVER['DOCUMENT_ROOT']));

use app\models\{Product, Users, Basket, Category, Feedback, News};
use app\engine\Db;
use app\interfaces\IModels;

include DIR_ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$users = new Users(new Db());
$basket = new Basket(new Db());
$category = new Category(new Db());
$news = new News(new Db());
$feedback = new Feedback(new Db());

function foo(IModels $model) {
    return $model->getTableName();
}

echo foo($product) . "</br>";
echo foo($users) . "</br>";
echo foo($basket) . "</br>";
echo foo($category) . "</br>";
echo foo($news) . "</br>";
echo foo($feedback) . "</br>";


echo '<a href="/hw2.php">Третий пункт ДЗ здесь!!!</a>';


