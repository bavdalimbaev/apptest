<?php
/* @var $user app\models\User */

use yii\bootstrap\Button;
use yii\helpers\Html;

$this->title = 'Изменение роли пользователя';
?>

<div class="row">
    <?php
    if (Yii::$app->session->hasFlash('success')) : ?>
        <div class="col-sm-8 col-sm-offset-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo Yii::$app->session->getFlash('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php
    endif; ?>
    <div class="col-sm-8 col-sm-offset-2 mb-4">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
            <div class="col-sm-8">
                <p>Имя: <?= $user->name ?></p>
                <p>Почта: <?= $user->email ?></p>
                <p>Дата: <?= getDateTime($user->dateadd) ?></p>
            </div>
            <div class="col-sm-4">
                <p>Роль: <?= $user->role ?></p>
                <form action="" method="post">
                    <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>
                    <?= Html::input('submit', 'btnEditRole', 'Изменить Роль', ['class' => 'btn btn-success']) ?>
                </form>
            </div>
        </div>
    </div>
</div>
