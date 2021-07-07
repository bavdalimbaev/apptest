<?php


namespace app\controllers;


use app\models\User;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex() {
        $id = Yii::$app->user->id;
        $users = User::find()->asArray()->where("id <> '$id'")->all();

        return $this->render('index', compact('users'));
    }

    public function actionView() {
        if (Yii::$app->user->identity->role != 'admin') {
            return $this->goHome();
        }

        $id = Yii::$app->request->get('id');
        $user = User::findOne($id);

        if (Yii::$app->request->post('btnEditRole')) {
            $user->role = ($user->role == 'user') ? 'admin' : 'user';
            $user->save();
            Yii::$app->session->setFlash('success', 'Вы успешно изменили статус!');
        }

        return $this->render('view', compact('user'));
    }

}