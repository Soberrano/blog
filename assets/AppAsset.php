<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/animate.min.css',
        'css/chocolat.css',
        'css/component.css',
        'css/style.css',

    ];
    public $js = [
        'js/classie.js',
        'js/main.js',
        'js/jquery.chocolat.js',
        'js/modernizr.custom.js',
        'js/uisearch.js',
        'js/wow.min.js',
        //'http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
