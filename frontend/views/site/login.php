<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//use yii\captcha\Captcha;

$this->title = 'Добро пожаловать в ЛК';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<section class="content">
    <div class="row">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Вход в ЛК</a></li>
                <li><a href="#rule" data-toggle="tab">Правила входа</a></li>
                <li><a href="#agreement" data-toggle="tab">Соглашение</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="login">

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="form-group">
                        <?= $form->field($model, 'username', $fieldOptions1)->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="form-group">
                        <?= $form->field($model, 'password', $fieldOptions2)->passwordInput() ?>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- --><? /*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) */ ?>
                        <?= $this->render('@common/widgets/views/_captcha', ['model' => $model, 'form' => $form]) ?>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>
                            <?= 'Если вы забыли пароль, вы можете восстановить его ' . Html::a('здесь', ['site/request-password-reset']); ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="tab-pane" id="rule">
                    <?= $this->render('@common/services/auth/layouts/rule-auth-html') ?>
                </div>
                <div class="tab-pane" id="agreement">
                    <?= $this->render('@common/services/auth/layouts/agreement-auth-html') ?>
                </div>
            </div>
        </div>
    </div>
</section>