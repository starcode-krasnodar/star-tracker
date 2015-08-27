<?php

namespace app\assets;

use yii\web\AssetBundle;

class RaphaelAsset extends AssetBundle
{
    public $sourcePath = '@bower/raphael';
    public $baseUrl = '@web';
    public $js = [
        YII_DEBUG ? 'raphael.js' : 'raphael-min.js',
    ];
}