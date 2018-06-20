<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserInit */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Inits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-init-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'surname',
            'name',
            'patronymic',
            'snils',
            'gender',
            'birthday',
            'age_flag',
            'phone_main',
            'phone_optional',
            'address',
            'rezume:ntext',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'email_confirm_token:email',
            'role',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
