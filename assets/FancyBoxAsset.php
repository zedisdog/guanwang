<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FancyBoxAsset extends AssetBundle
{
    public $basePath = '@webroot/facnybox';
    public $baseUrl = '@web/fancybox';
    public $css = [
        'jquery.fancybox-1.3.4.css',
    ];
    public $js = [
        'jquery.fancybox-1.3.4.pack.js'
    ];
    public $depends = [
        'app\assets\IndexAsset'
    ];
}
