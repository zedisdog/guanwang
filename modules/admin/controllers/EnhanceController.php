<?php

namespace app\modules\admin\controllers;

use app\models\Enhance;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class EnhanceController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '软件系统增强日志管理';
        list($list,$pages) = Enhance::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($logId=null){
        if($logId){
            $log = Enhance::findOne($logId);
        }else{
            $log = New Enhance();
        }

        $ajaxUrl = Url::toRoute('enhance/ajax-save');
        $redirectUrl = Url::toRoute('enhance/index');

        return $this->render('edit_enhance',['item'=>$log,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $log = Enhance::findOne($id);
        }else{
            $log = New Enhance();
        }

        if($log->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $log->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $log = new Enhance();
        $data = Yii::$app->request->post();
        $log->attributes = $data;
        if(!$log->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $log->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($logId){
        Enhance::findOne($logId)->delete();
        $this->redirect(Url::toRoute('enhance/index'));
    }

}
