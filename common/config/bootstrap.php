<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('com_images', dirname( dirname( __DIR__ ) ) . 'common/images' );
Yii::setAlias('@siteurl', 'http://admin.loc' );
Yii::setAlias('@sitefront', '@siteurl/frontend/web' );
Yii::setAlias('@siteback', '@siteurl/backend/web' );