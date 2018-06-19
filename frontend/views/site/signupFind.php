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

            <?= $form->field($model, 'surname') ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'patronymic') ?>

            <?= $form->field($model, 'birthday') ?>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'find-button', 'value' => 'find']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php /*$form = ActiveForm::begin([ 'id' => 'form', 'method' => 'POST',
    'action' => 'action.php',
    'options' => ['style' => 'width: 100%;', 'autocomplete' => 'off']
]);*/?>