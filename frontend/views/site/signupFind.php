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
            <?php $form = ActiveForm::begin(['id' => 'form-signup-find']); ?>

            <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'patronymic') ?>

            <?= $form->field($model, 'birthday') ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>