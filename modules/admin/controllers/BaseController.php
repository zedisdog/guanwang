<?php

namespace app\modules\admin\controllers;

use yii\helpers\Url;
use yii\web\Controller;

class BaseController extends Controller{
    public $enableCsrfValidation = false;
    public function __construct($id, $module, $config = []){
        parent::__construct($id, $module, $config);
        if(!\Yii::$app->session['admin']){
            $this->redirect(Url::to('/admin/default/login'));
        }
    }
}