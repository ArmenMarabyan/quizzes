<?php
namespace app\controllers;
use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;

class SearchController extends AppController {

    public function actionIndex() {
        $model = new Main;

        if($this->isAjax()) {
            $query = trim(htmlspecialchars($_POST['search']));
            if($query != '') {
                $tests = \R::findAll('tests', "title LIKE ? OR description LIKE ? ORDER BY id DESC", ["%$query%", "%$query%"]);

                $this->loadView('Search/search_results', compact('tests'));
            }
            die; 
        }

        $total = \R::count('tests');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 8;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $query = '';

        if (isset($_GET['q']) && $_GET['q'] !== '') {
            $query = trim(htmlspecialchars($_GET['q']));
            $tests = \R::findAll('tests', "title LIKE ? OR description LIKE ? ORDER BY id DESC LIMIT $start,$perpage", ["%$query%", "%$query%"]);
        }

        View::setMeta("Тесты", 1, 2);
        $this->set(compact('tests', 'pagination','query'));
    }

}