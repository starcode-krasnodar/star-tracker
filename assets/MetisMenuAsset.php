<?php

namespace app\assets;

use yii\web\AssetBundle;

class MetisMenuAsset extends AssetBundle
{
    public $sourcePath = '@bower/metisMenu/dist';
    public $baseUrl = '@web';
    public $css = [
        YII_DEBUG ? 'metisMenu.css' : 'metisMenu.min.css',
    ];
    public $js = [
        YII_DEBUG ? 'metisMenu.js' : 'metisMenu.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}