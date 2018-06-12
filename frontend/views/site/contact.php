<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = \Yii::t('app', 'Feedback');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="site-contact">-->
<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <p class="text-muted">
                    <?= \Yii::t('app', 'If you have questions, please fill out the following form to contact us. Thank you.'); ?>
                </p>
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="form-group">

                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="form-group">

                    <?= $form->field($model, 'subject') ?>
                </div>
                <div class="form-group">

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group">

                    <? /*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) */ ?>
                    <?= $this->render('@common/widgets/views/_captcha', ['model' => $model, 'form' => $form]) ?>
                    <hr>
                    <div class="form-group">
                        <?= Html::submitButton(\Yii::t('app', 'Submit'), ['class' => 'btn btn-primary btn-block', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
