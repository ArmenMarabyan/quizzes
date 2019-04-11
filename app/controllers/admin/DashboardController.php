<?php

namespace app\controllers\admin;


use fw\core\base\View;
use app\models\Main;
use app\models\Category;

class DashboardController extends AppController {

    public function actionIndex() {
        $model = new Main;

        $tests = \R::findAll('tests', 'ORDER BY id DESC LIMIT 10');
        $testsCount = \R::count('tests');

        $categories = \R::findAll('categories', 'ORDER BY id DESC LIMIT 10');
        $categoriesCount = \R::count('categories');

        View::setMeta('Admin Panel');
        $this->set(compact('tests', 'testsCount', 'questions', 'categories', 'categoriesCount'));
    }

}