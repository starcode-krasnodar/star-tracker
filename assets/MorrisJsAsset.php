<?php

namespace app\assets;

use yii\web\AssetBundle;

class MorrisJsAsset extends AssetBundle
{
    public $sourcePath = '@bower/morrisjs';
    public $baseUrl = '@web';
    public $js = [
        'morris.js',
    ];
    public $depends = [
        'app\assets\RaphaelAsset',
        'yii\web\JqueryAsset',
    ];
}