<?php

namespace app\assets;

use yii\web\AssetBundle;

class RaphaelAsset extends AssetBundle
{
    public $sourcePath = '@bower/raphael';
    public $baseUrl = '@web';
    public $js = [
        'raphael.js',
    ];
}