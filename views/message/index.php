<?php

/* @var $this yii\web\View */

/* @var $form yii\bootstrap\ActiveForm */

/* @var $messages app\models\Message */
/* @var $pages yii\data\Pagination */

/* @var $messageForm app\models\MessageForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Message';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-sm-5 col-sm-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span> Chat
            </div>
            <div class="panel-body">
                <ul class="chat list-unstyled">
                    <?php
                    foreach ($messages as $message) : ?>
                        <?php
                        if ($message['user_id'] == \Yii::$app->user->id) : ?>
                            <?php
                            if ($message['status'] == 'show') : ?>
                                <li class="right mt-2 clearfix">
                                <span class="chat-img pull-right">
                                    <?= Html::img(
                                        'https://media.lrng.org/95/ad/975b75a382848df61b168abb7931fabc0b54-500x491.png',
                                        ['alt' => 'you', 'class' => 'img-circle', 'style' => 'width:50px']
                                    ) ?>
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <span class="glyphicon glyphicon-time"></span>
                                                <?= getDateTime($message['dateadd']) ?>
                                            </small>
                                            <strong class="pull-right primary-font">
                                                YOU
                                            </strong>
                                        </div>
                                        <p><?= $message['report'] ?></p>
                                    </div>
                                </li>

                            <?php
                            endif; ?>
                        <?php
                        else: ?>

                            <?php
                            $img = ($message['role'] == 'admin')
                                ? 'https://thumbs.dreamstime.com/b/grunge-%D1%82%D0%B5%D0%BA%D1%81%D1%82%D1%83%D1%80%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BB-%D1%83%D0%BF%D0%BB%D0%BE%D1%82%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-%D0%BF%D0%B5%D1%87%D0%B0%D1%82%D0%B8-admin-133645421.jpg'
                                : 'https://mind-formula.com/img/no-avatar.png'; ?>

                            <?php
                            if (\Yii::$app->user->identity->role == 'admin') : ?>
                                <?php
                                if ($message['status'] == 'hide') : ?>
                                    <li class="left mt-2 bg-danger clearfix">
                            <span class="chat-img pull-left">
                                <?= Html::img(
                                    $img,
                                    [
                                        'alt' => $message['name'],
                                        'class' => 'img-circle',
                                        'style' => 'width:45px'
                                    ]
                                ) ?>
                            </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"><?= $message['name'] ?></strong>
                                                <small class="pull-right text-muted">
                                                    <?= getDateTime($message['dateadd']) ?> <span
                                                            class="glyphicon glyphicon-time"></span>
                                                    <?php
                                                    if (\Yii::$app->user->identity->role == 'admin') : ?>
                                                        <a href="/message/hide/<?= $message['id'] ?>"><span
                                                                    class="glyphicon glyphicon-ok"></span></a>
                                                    <?php
                                                    endif; ?>
                                                </small>
                                            </div>
                                            <p><?= $message['report'] ?></p>
                                        </div>
                                    </li>
                                <?php
                                //!hide
                                else: ?>
                                    <li class="left mt-2 clearfix">
                                    <span class="chat-img pull-left">
                                        <?= Html::img(
                                            $img,
                                            [
                                                'alt' => $message['name'],
                                                'class' => 'img-circle',
                                                'style' => 'width:45px'
                                            ]
                                        ) ?>
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"><?= $message['name'] ?></strong>
                                                <small class="pull-right text-muted">
                                                    <?= getDateTime($message['dateadd']) ?> <span
                                                            class="glyphicon glyphicon-time"></span>
                                                    <?php
                                                    if (\Yii::$app->user->identity->role == 'admin') : ?>
                                                        <a href="/message/hide/<?= $message['id'] ?>"><span
                                                                    class="glyphicon glyphicon-remove"></span></a>
                                                    <?php
                                                    endif; ?>
                                                </small>
                                            </div>
                                            <p><?= $message['report'] ?></p>
                                        </div>
                                    </li>
                                <?php
                                endif; ?>

                            <?php
                            //!admin
                            else: ?>
                                <?php
                                if ($message['status'] == 'show') :?>
                                    <li class="left mt-2 <?= ($message['role'] == 'admin') ? 'bg-warning' : ''; ?> clearfix">
                                    <span class="chat-img pull-left">
                                        <?= Html::img(
                                            $img,
                                            [
                                                'alt' => $message['name'],
                                                'class' => 'img-circle',
                                                'style' => 'width:45px'
                                            ]
                                        ) ?>
                                    </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font"><?= $message['name'] ?></strong>
                                                <small class="pull-right text-muted">
                                                    <?= getDateTime($message['dateadd']) ?> <span
                                                            class="glyphicon glyphicon-time"></span>
                                                    <?php
                                                    if (\Yii::$app->user->identity->role == 'admin') : ?>
                                                        <a href="/message/hide/<?= $message['id'] ?>"><span
                                                                    class="glyphicon glyphicon-remove"></span></a>
                                                    <?php
                                                    endif; ?>
                                                </small>
                                            </div>
                                            <p><?= $message['report'] ?></p>
                                        </div>
                                    </li>
                                <?php
                                endif; ?>
                            <?php
                            endif; ?>

                        <?php
                        endif; ?>

                    <?php
                    endforeach; ?>

                </ul>
            </div>
            <?php
            if (!Yii::$app->user->isGuest): ?>
                <div class="panel-footer">
                    <?php
                    $form = ActiveForm::begin(['id' => 'message-form', 'class' => 'input-group']); ?>

                    <?= $form->field($messageForm, 'report')->textInput(
                        ['class' => 'form-control input-sm', 'placeholder' => 'Type your message here...']
                    )->label(false) ?>

                    <span class="input-group-btn">
                    <?= Html::submitButton(
                        'Отправить',
                        ['class' => 'btn btn-warning btn-block', 'name' => 'messageButton']
                    ) ?>
                </span>

                    <?php
                    ActiveForm::end(); ?>
                </div>
            <?php
            endif; ?>
        </div>
    </div>

</div>