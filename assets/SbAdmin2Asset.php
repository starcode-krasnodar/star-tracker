<?php

namespace app\assets;

use yii\web\AssetBundle;

class SbAdmin2Asset extends AssetBundle
{
    public $sourcePath = '@bower/startbootstrap-sb-admin-2/dist';
    public $baseUrl = '@bower/web';
    public $css = [
        'css/sb-admin-2.css',
        'css/timeline.css',
    ];
    public $js = [
        'js/sb-admin-2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
        'app\assets\MetisMenuAsset',
        'app\assets\MorrisJsAsset',
    ];
}