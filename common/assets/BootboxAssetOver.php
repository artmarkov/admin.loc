<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 03.06.2018
 * Time: 21:55
 */

namespace common\assets;


class BootboxAssetOver extends \yii\web\AssetBundle
{
    public $sourcePath = '@common/assets';
    public $js = [
        //js переопределяющий yii.confirm
        'js/yii.confirm.overrides.js',
    ];
    public $depends = [
        //импорт файлов BootboxAsset
        'common\assets\BootboxAsset',
    ];
}