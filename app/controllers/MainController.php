<?php


namespace app\controllers;


use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;


class MainController extends AppController {

    public function actionIndex() {
        $model = new Main;
        $categories = \R::findAll('categories', 'ORDER BY id DESC LIMIT 10');
        
        if($this->isAjax()) {
            $catId = htmlspecialchars($_POST['id']);
            $tests = \R::findAll("tests", "category_id = $catId");
            if($catId == 0) {
                $tests = \R::findAll('tests');
            }
            $this->loadView('Main/test', compact('tests'));
            die;
        }else {
            $tests = \R::findAll('tests', 'ORDER BY id DESC'); // запрос
        }

        View::setMeta('Главная', 'Описание', 'Ключевые слова');
        $this->set(compact('tests', 'categories'));

    }

}