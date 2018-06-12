<?php

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/signup-confirm', 'token' => $user->email_confirm_token]);

?>
Здравсивуйте, <?= $user->username ?>. *

Пройдите по ссылке для подтверждения email: <?= $confirmLink ?>

* Создано автоматически. Пожалуйста не отвечайте на данное письмо.