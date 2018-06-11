<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

    if (class_exists('frontend\assets\AppAsset')) {
        frontend\assets\AppAsset::register($this);

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- Google Font -->

    </head>
    <?php if (Yii::$app->user->isGuest) { ?>
    <body class="skin-blue sidebar-mini fixed" style="height: auto; min-height: 100%;">
    <?} else { ?>
    <body class="sidebar-mini skin-blue-light fixed" style="height: auto; min-height: 100%;">
    <? } ?>
    <?php $this->beginBody() ?>
    <div class="wrapper">
<!--    --><?// if(Yii::$app->user->can('canAdmin')): ?><!----><?// endif;?>
        <?php if (Yii::$app->user->isGuest) { ?>
        <?= $this->render('header-guest.php', ['directoryAsset' => $directoryAsset]) ?>
         <?} else { ?>
        <?= $this->render('header.php', ['directoryAsset' => $directoryAsset]) ?>
        <?= $this->render('left.php', ['directoryAsset' => $directoryAsset]) ?>
        <? } ?>
        <?= $this->render('content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>

    </div>

    <!--кнопка вверх-->
    <?= common\widgets\ScrollupWidget::widget() ?>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
