<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-init-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'snils') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php  echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'age_flag') ?>

    <?php  echo $form->field($model, 'phone_main') ?>

    <?php // echo $form->field($model, 'phone_optional') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'rezume') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <?php  echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'email_confirm_token') ?>

    <?php  echo $form->field($model, 'role') ?>

    <?php  echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
