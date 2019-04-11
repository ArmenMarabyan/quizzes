<?php
namespace app\controllers\admin;
use fw\core\base\View;
use fw\libs\Pagination;
use app\models\Category;

class CategoryController extends AppController {

    public function actionIndex() {
        $model = new Category;

        $categoriesCount = \R::count('categories');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 8;

        $pagination = new Pagination($page, $perpage, $categoriesCount);
        $start = $pagination->getStart();

        $categories = \R::findAll('categories', "ORDER BY id DESC LIMIT $start,$perpage");

        View::setMeta("Admin::categories", 1, 2);
        $this->set(compact('categories', 'pagination', 'categoriesCount'));
    }

    public function actionCreate() {
        $model = new Category;
        if(isset($_POST['submit'])) {

            $data = [];

            foreach($_POST as $k => $v) {
                $data[$k] = trim(htmlspecialchars($v));
            }
            
            $model->load($data);
            if(!$model->validate($data)) {
                $model->getErrors();
                $_SESSION['form_data'] = $data;

                redirect();
            }
            if($model->save('categories')) {
                $_SESSION['success'] = 'Категория добавлена';
                unset($_SESSION['form_data']);
            }else {
                $_SESSION['error'] = 'Ошибка';
            }
            redirect();
        }

        View::setMeta("Admin::create", 1, 2);
    }

}