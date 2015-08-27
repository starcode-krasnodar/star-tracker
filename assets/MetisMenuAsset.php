<?php

namespace app\assets;

use yii\web\AssetBundle;

class MetisMenuAsset extends AssetBundle
{
    public $sourcePath = '@bower/metisMenu/dist';
    public $baseUrl = '@web';
    public $css = [
        'metisMenu.css',
    ];
    public $js = [
        'metisMenu.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}