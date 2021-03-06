<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'font-awesome-4.7.0/css/font-awesome.css',
        'js/select2/select2.min.css',
        'css/bootstrap-grid.min.css',
        'js/slick/slick.css',
        'css/main_style.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/jquery.sticky-kit.js',
        'js/slick/slick.min.js',
        'js/select2/select2.min.js',
        'js/script.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
