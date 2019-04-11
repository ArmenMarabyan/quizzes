<?php
namespace app\models;
use fw\core\base\Model;

class Question extends Model {

    public $attributes = [
        'q_title' => '',
        'test_id' => '',
        'correct' => '',
        'variant_1' => '',
        'variant_2' => '',
        'variant_3' => '',
        'variant_4' => '',
    ];

    public $rules = [
        'required' => [
            ['q_title'],
            ['test_id'],
            ['correct'],
            ['variant_1'],
            ['variant_2'],
            ['variant_3'],
            ['variant_4'],
        ]
    ];

}
