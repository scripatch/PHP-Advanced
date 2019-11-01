<?php


namespace app\models;


class Category extends Model
{
    public $id;
    public $category;

    public function getTableName()
    {
        return "category";
    }
}