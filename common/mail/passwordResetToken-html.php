<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Здравствуйте, <?= Html::encode($user->username) ?>. *</p>

    <p>Пройдите по ссылке для сброса пароля:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

    <p></p>

    <hr>

    <p>* Создано автоматически. Пожалуйста не отвечайте на данное письмо.</p>
</div>
