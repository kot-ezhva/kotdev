<?php
class UserController extends Controller
{
    public $layout = "login";

    public function actionLogin()
    {
        if(isset($_POST['username']) && isset($_POST['password'])){
            $identity=new UserIdentity($_POST['username'], $_POST['password']);
            if($identity->authenticate()){
                Yii::app()->user->login($identity);
                $this->redirect($this->createUrl('block/index'));
            }else echo $identity->errorMessage;
        }
        $this->render('login');
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }
}