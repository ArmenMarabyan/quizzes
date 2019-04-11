<?php
namespace app\controllers;
use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;

class TestsController extends AppController {

    public function actionIndex() {
        $model = new Main;

        unset($_SESSION['passed']);

        $total = \R::count('tests');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 8;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $tests = \R::findAll('tests', "ORDER BY id DESC LIMIT $start,$perpage"); // запрос

        View::setMeta("Тесты", 1, 2);
        $this->set(compact('tests', 'pagination'));

    }



    public function actionView() {

        $model = new Main;
        $alias = htmlspecialchars($this->route['alias']);

        $test = \R::findOne('tests', 'alias = ?', [$alias]);
        $testId = $test->id;

        $questions = \R::findAll('questions', 'test_id = ?', [$testId]);
        $questionsArr = [];

        $correctAnswCount = 0;

        foreach($questions as $k => $t) {
            $questionsArr[$t->id] = '';

            if(isset($_SESSION['questions'])) {
                if($_SESSION['questions'][$k] === $questions[$k]->correct) {
                    $correctAnswCount++;
                }
            }
        }

        if(!isset($_SESSION['questions'])) {
            $_SESSION["questions"] = $questionsArr;
        }
        $id = 0;
        $currentAnswer = $id;

        foreach($_SESSION["questions"] as $k => $v) {
            $currentAnswer++;
            if($_SESSION["questions"][$k] === '' || $_SESSION["questions"][$k] == null) {
                $id = $k;
                break;
            }
        }

        $question = \R::findOne('questions', 'id = ?', [$id]);

        if(!in_array('', $_SESSION['questions']) && count($questions) > 0) {
            $this->actionResults($questions);
        }

        if(isset($_POST['submit'])) {
            $questionId = $_POST['test_id'];
            $answer = isset($_POST["variant"]) ? $_POST["variant"] : null;
            $_SESSION["questions"]["$questionId"] = $answer;
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }

        View::setMeta("Тест знаний: $alias", 1, 2);
        $this->set(compact(
            'question',
            'questions',
            'currentAnswer',
            'test',
            'correctAnswCount'
        ));
    }


    public function actionResults($questions) {
        $this->view = 'results';
        $test = \R::findOne('tests', 'alias = ?', [$this->route['alias']]);

        

        if(!isset($_SESSION['passed'])) {
            $passed = ++$test->passed;
            $result = \R::exec('UPDATE `tests` SET `passed`='.$passed.' WHERE `alias` = :alias', [':alias' => $this->route['alias']]);
            
            if($result) {
                $_SESSION['passed'] = '1';

            }
        }
        
    }

}