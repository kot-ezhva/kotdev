<?php
class UserController extends Controller
{
    public $layout = "login";

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return [
            [
                'allow',
                'actions' => ['edit', 'logout'],
                'users' => ['@'],
            ],
            [
                'allow',
                'actions' => ['login'],
                'users' => ['?'],
            ],
            [
                'deny',
                'users' => ['*'],
            ],
        ];
    }

    public function actionLogin()
    {
        if(isset($_POST['username']) && isset($_POST['password'])){
            $identity=new UserIdentity($_POST['username'], $_POST['password']);
            if($identity->authenticate()){
                Yii::app()->user->login($identity);
                $this->redirect(Yii::app()->user->returnUrl);
            }else echo $identity->errorMessage;
        }
        $this->render('login');
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }

    public function actionEdit()
    {
        $this->layout = '';
        $user = User::model()->findByPk(Yii::app()->user->id);
        $curPass = $user->password;
        $user->password = "";
        if(isset($_POST['User'])){
            $user->attributes = $_POST['User'];
            if($_POST['User']['password']){
                $user->password = CPasswordHelper::hashPassword($_POST['User']['password']);
            }
            if($user->password == ""){
                $user->password = $curPass;
            }
            $user->save();
            $this->redirect($this->createUrl('dashboard/index'));
        }
        $this->render('edit', [
            'user' => $user
        ]);
    }
}