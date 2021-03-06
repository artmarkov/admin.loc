<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = \Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= \Yii::t('app', 'Please fill out the following fields to signup:')?></p>

    <div class="row">
        <div class="col-lg-5">
            <h4>   Ваш логин:  <?= $model->username ?> </h4>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->label(false)->hiddenInput(['value' => $model->username]); ?>

            <?= $form->field($model, 'id')->label(false)->hiddenInput(['value' => $model->id]); ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button', 'value' => 'create']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
