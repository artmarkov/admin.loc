<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//use yii\captcha\Captcha;

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <p class="text-muted">Пожалуйста введите свой логин и адрес электронной почты, указанный при
                    регистрации.</p>
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <div class="form-group">
                    <?= $form->field($model, 'username', $fieldOptions1) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'email', $fieldOptions2)->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">
                    <? /*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) */ ?>
                    <?= $this->render('@common/widgets/views/_captcha', ['model' => $model, 'form' => $form]) ?>
                </div>
                <hr>
                <div class="form-group">
                    <label>
                        <?= 'Забыли Имя пользователя? Нажмите ' . Html::a('сюда', ['site/request-login-reset']); ?>
                    </label>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

            <hr>
        </div>
    </div>
</section>
