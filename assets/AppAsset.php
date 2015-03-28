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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/base.css',
        'css/layout.css',
    ];
    public $js = [
        'js/jquery-1.7.1.min.js',
        'js/share.js',
        'http://js.t.sinajs.cn/open/widget/js/share/share_button.js?version=201402171355',
    ];
    public $depends = [
    ];
}
