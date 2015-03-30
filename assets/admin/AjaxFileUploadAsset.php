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
class AjaxFileUploadAsset extends AssetBundle
{
    public $basePath = '@webroot/admin';
    public $baseUrl = '@web/admin';
    public $css = [
    ];
    public $js = [
        'plugins/ajaxfileupload/ajaxfileupload.js',
        'js/imageUpload.js',
    ];
    public $depends = [
        'app\assets\admin\AdminAsset',
    ];
}
