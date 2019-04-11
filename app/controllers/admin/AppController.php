<?php

namespace app\controllers\admin;
use app\models\User;
use fw\core\base\Controller;

class AppController extends Controller{
    public $layout = 'admin';

    public function __construct($route) {
        $this->checkIsAdmin();
        parent::__construct($route);

    }

    public function checkIsAdmin() {

        if(isset($_SESSION['user'])) {
            $model = new User;
            $userId = $_SESSION['user']['id'];

            $user = \R::findOne('users', "id = $userId");

            if($user->role == 'admin') {
                return true;
            }
        }
        die('Access denied');
    }
}