<?php
/* @var $messages app\models\Message */

use yii\helpers\Html;

$this->title = 'Скрытые сообщения';

$showNow = <<< JS
$( ".showNow" ).click(function() {
  let id = $( this ).data( "id" );
  $('#showOnChat').attr("href", "/message/hide/"+id)
});

JS;

$this->registerJs(
    $showNow,
    \yii\web\View::POS_READY
)
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
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Message</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($messages as $message): ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $message['report'] ?></td>
                    <td><?= $message['name'] ?></td>
                    <td><a data-id="<?= $message['id'] ?>" class="showNow text-decoration-none"
                           data-toggle="modal" data-target="#showNow" style="cursor: pointer;">Показать в чате</a></td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="showNow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Вы действительно хотите?</h4>
            </div>
            <div class="modal-body">
                Нажмите "ДА", если хотите показать в чате
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отменить</button>
                <a href="" id="showOnChat" class="btn btn-primary">Да</a>
            </div>
        </div>
    </div>
</div>
