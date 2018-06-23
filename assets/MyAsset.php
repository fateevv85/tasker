<?php

namespace app\assets;


use yii\web\AssetBundle;

class MyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'js/my.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}