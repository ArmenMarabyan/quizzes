<?php
namespace app\controllers;
use app\models\Main;
use fw\core\base\View;
use Valitron\Validator;

class PagesController extends AppController {

    public function actionIndex() {
        
    }

    public function actionFeedback() {

        $formData = [
        	'name' => '',
        	'email' => '',
        	'message' => '',
        ];

        if(isset($_POST['submit'])) {
        	$name = trim(htmlspecialchars($_POST['name']));
        	$email = trim(htmlspecialchars($_POST['email']));
        	$message = trim(htmlspecialchars($_POST['message']));

        	$formData = [
	        	'name' => $name,
	        	'email' => $email,
	        	'message' => $message,
	        ];

        	$v = new Validator($_POST);
			$v->rule('required', ['name', 'email', 'message']);
			$v->rule('email', 'email');
			if($v->validate()) {
			    $_SESSION['success'] = 'Письмо отправлено администратору';
			    redirect();
			}else {
			    $errors = '<ul>';
		        foreach($v->errors() as $error) {
		            foreach($error as $item) {
		                $errors .= "<li>$item</li>";
		            }
		        }
		        $errors .= '</ul>';
		        $_SESSION['error'] = $errors;
		        redirect();
			}
        }

        View::setMeta('Обратная связь', 1, 2);
        $this->set(compact('formData'));
    }

}