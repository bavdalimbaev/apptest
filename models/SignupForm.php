<?php

namespace app\models;

use yii\base\Model;


class SignupForm extends Model
{

    public $name;
    public $email;
    public $password;


    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 155],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такая почта уже существует'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = \Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}