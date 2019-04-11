<?php

namespace app\models;
use fw\core\base\Model;

class Category extends Model {

    public $attributes = [
        'title' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
        ],
    ];

}