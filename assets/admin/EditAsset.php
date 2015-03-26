<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets\admin;

use yii\web\AssetBundle;

/**
 * @author zed
 * @since 2.0
 */
class EditAsset extends AssetBundle
{
    public $basePath = '@webroot/admin';
    public $baseUrl = '@web/admin';
    public $css = [
        'plugins/kindeditor/themes/default/default.css',
    ];
    public $js = [
        'plugins/kindeditor/kindeditor-all-min.js',
        'plugins/kindeditor/lang/zh_CN.js',
        'js/edit.js',
        'js/form.js',
    ];
    public $depends = [
        'app\assets\admin\AdminAsset',
    ];
}
