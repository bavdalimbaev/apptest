<?php


namespace app\models;


use yii\base\Model;

class MessageForm extends Model
{
    public $report;

    public function rules()
    {
        return [
            ['report', 'trim'],
        ];
    }

    public function message()
    {
        if (!$this->validate()) {
            return null;
        }

        $message = new Message();
        $message->report = $this->report;
        $message->user_id = \Yii::$app->user->id;
        $message->save();
    }

}