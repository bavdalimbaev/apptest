<?php
/* @var $users app\models\User */

use yii\helpers\Html;

$this->title = 'Все пользователи';
?>

<div class="row">
    <div class="col-sm-8 col-sm-offset-2 mb-4">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><a href="/user/<?= $user['id'] ?>" class="text-decoration-none" >Изменить роль</a></td>
                </tr>
            <?php
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
