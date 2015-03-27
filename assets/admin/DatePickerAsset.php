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
class DatePickerAsset extends AssetBundle
{
    public $basePath = '@webroot/admin';
    public $baseUrl = '@web/admin';
    public $css = [
        'plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css',
    ];
    public $js = [
        'plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
        'plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js',
        'js/datePicker.js'
    ];
    public $depends = [
        'app\assets\admin\AdminAsset',
    ];
}
