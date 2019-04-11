<?php
namespace app\controllers\admin;
use fw\core\base\View;
use fw\libs\Pagination;
use app\models\Test;
use app\models\Question;

class TestsController extends AppController {

    public function actionIndex() {
        $model = new Test;

        unset($_SESSION['passed']);

        $testsCount = \R::count('tests');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 8;

        $pagination = new Pagination($page, $perpage, $testsCount);
        $start = $pagination->getStart();

        $tests = \R::findAll('tests', "ORDER BY id DESC LIMIT $start,$perpage");

        View::setMeta("Admin::tests", 1, 2);
        $this->set(compact('tests', 'pagination', 'testsCount'));
    }

    public function actionCreate() {
    	$model = new Test;

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
            $id = $model->save('tests');
            
            if($id) {
            	$model->testUploadImage($_FILES['files'], $id);
                $_SESSION['success'] = 'Test добавлен';
                unset($_SESSION['form_data']);
            }else {
                $_SESSION['error'] = 'Ошибка';
            }
            redirect();
        }

        $categories = \R::findAll('categories');

    	View::setMeta("Admin::Tests create", 1, 2);
    	$this->set(compact('categories'));
    }

    public function actionCreateQuestions() {
    	$model = new Question;

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
            $id = $model->save('questions');
            
            if($id) {
                $_SESSION['success'] = 'Вопрос добавлен';
                unset($_SESSION['form_data']);
            }else {
                $_SESSION['error'] = 'Ошибка';
            }
            redirect();
        }

		$tests = \R::findAll('tests');

    	View::setMeta("Admin::create", 1, 2);
    	$this->set(compact('tests'));
    }

    public function actionEdit() {
    	$model = new Test;

    	$id = (int) $this->route['alias'];

    	if(isset($_POST['submit'])) {

            $data = [];

            foreach($_POST as $k => $v) {
                $data[$k] = trim(htmlspecialchars($v));
            }

            $model->load($data);
            if(!$model->validate($data)) {
                $model->getErrors();
                redirect();
            }

            $res = $model->save('tests', $id);   
            
            if($res) {
            	$model->testUploadImage($_FILES['files'], $id);
                $_SESSION['success'] = 'Test успешно обновлена';
            }else {
                $_SESSION['error'] = 'Ошибка';
            }
            redirect();
        }

    	$test = \R::findOne('tests', 'id = '.$id);

    	$categories = \R::findAll('categories');

    	View::setMeta("Admin::Test edit", 1, 2);
    	$this->set(compact('categories', 'test'));

    }


    public function actionDelete() {

    	$id = (int) $this->route['alias'];

    	if($id) {
    		$questions = \R::findAll('questions', 'test_id = '.$id);

	    	\R::trashAll($questions);

	    	$image = WWW.'/assets/images/testImages/test_'.$id.'.jpg';

    		if(file_exists($image)) {
    			unlink($image);
    		}

	    	$test = \R::findOne('tests', 'id = '.$id);
	    	\R::trash($test);
    	}

    	redirect();
    }

}