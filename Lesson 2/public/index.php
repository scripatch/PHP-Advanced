<?php

//use app\models\{Product, Users};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$users = new Users(new Db());

function foo(IModels $model) {
    return $model->getTableName();
}

echo foo($users);

//echo $product->getOne(1);


