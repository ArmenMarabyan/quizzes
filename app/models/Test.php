<?php

namespace app\models;
use fw\core\base\Model;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class Test extends Model {

    public $attributes = [
        'title' => '',
        'alias' => '',
        'description' => '',
        'category_id' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['alias'],
            ['description'],
        ]
    ];


    public function testUploadImage($tmpPath, $id) {

        //если из формы загружена картинка - помещаем в папку
        if(is_uploaded_file($tmpPath['tmp_name'])) {
            $ext = pathinfo($tmpPath['name'], PATHINFO_EXTENSION);

            if(empty($tmpPath['tmp_name'])) {
                $imagePath = 'noImage/no-image.png';
            }else {
                $imagePath = 'testImages/test_'. $id . '.jpg';
            }

            Image::load($tmpPath['tmp_name'])
                ->width(400)
                ->height(400)
                ->save(WWW.'/assets/images/'.$imagePath);

            $test = \R::load('tests', $id);
            $test->image = $imagePath; 
            \R::store($test);

               //IMAGICK
            // $img = new Imagick($tmpPath);
            // $img->cropThumbnailImage(150,150);
            // $img->setImageCompressionQuality(80);
            // $img->writeImage(WWW.'/assets/images/'.$imagePath);

            // move_uploaded_file($tmpPath, WWW.'/assets/images/'.$imagePath);
        }

        
    }

}

