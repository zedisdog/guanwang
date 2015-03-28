<?php

namespace app\modules\admin\controllers;

use app\models\Config;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class ConfigController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '设置';
        $config = Config::findOne(1);
        if(!$config){
            $config = New Config();
        }

        $ajaxUrl = Url::toRoute('config/ajax-save');
        $redirectUrl = Url::toRoute('config/index');

        return $this->render('edit_config',['item'=>$config,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $r = [];
        $config = Config::findOne(1);
        if(!$config){
            $config = New Config();
        }

        if($config->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $config->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $config = new Config();
        $data = Yii::$app->request->post();
        $config->attributes = $data;
        if(!$config->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $config->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }
}
