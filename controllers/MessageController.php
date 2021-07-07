<?php


namespace app\controllers;


use app\models\Message;
use app\models\MessageForm;
use Yii;
use yii\web\Controller;

class MessageController extends Controller
{

    public function actionIndex()
    {
        $messageForm = new MessageForm();

        if ($messageForm->load(Yii::$app->request->post())) {
            $messageForm->message();
            return $this->refresh();
        }

        // с использованием JOIN
        $messages = Message::find()
            ->select([
                         'messages.*', 'users.role', 'users.name',
                     ])
            ->innerJoin('`users`', 'users.id = messages.user_id')
            ->asArray()->all();

        // с использованием JOIN
        return $this->render('index', compact('messageForm', 'messages'));


        // с использованием hasOne
//        $messages = Message::find()->with('user')->asArray()->all();

        // с использованием hasOne
//        return $this->render('_index', compact('messageForm', 'messages'));
    }


    public function actionHide()
    {
        if (Yii::$app->user->identity->role != 'admin') {
            return $this->goHome();
        }

        if (Yii::$app->request->get('id')) {
            $message = Message::findOne(Yii::$app->request->get('id'));
            $message->status = ($message->status == 'hide') ? 'show' : 'hide';
            $message->save();
            Yii::$app->session->setFlash('success', 'Ваш запрос успешен!');
        }

        $messages = Message::find()
            ->select(
                [
                    'messages.*',
                    'users.role',
                    'users.name',
                ]
            )
            ->innerJoin('`users`', 'users.id = messages.user_id')
            ->asArray()
            ->where("messages.status = 'hide'")
            ->all();
//        VarDumper::dump($messages, 3, true);
        return $this->render('hide', compact('messages'));
    }
}