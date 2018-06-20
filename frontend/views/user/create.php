<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserInit */

$this->title = Yii::t('app', 'Create User Init');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Inits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-init-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
