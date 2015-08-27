<?php

namespace app\assets;

use yii\web\AssetBundle;

class MorrisJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/morris.js';
    public $baseUrl = '@web';
    public $js = [
        YII_DEBUG ? 'morris.js' : 'morris.min.js',
    ];
    public $depends = [
        'app\assets\RaphaelAsset',
        'yii\web\JqueryAsset',
    ];
}