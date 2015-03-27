<?php

namespace app\modules\admin\controllers;

use app\models\SoftwareType;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class SoftwareTypeController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '软件分类管理';
        list($list,$pages) = SoftwareType::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($typeId=null){
        if($typeId){
            $softwareType = SoftwareType::findOne($typeId);
        }else{
            $softwareType = New SoftwareType();
        }

        $ajaxUrl = Url::toRoute('software-type/ajax-save');
        $redirectUrl = Url::toRoute('software-type/index');

        return $this->render('edit_software_type',['item'=>$softwareType,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $softwareType = SoftwareType::findOne($id);
        }else{
            $softwareType = New SoftwareType();
        }

        if($softwareType->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $softwareType->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $softwareType = new SoftwareType();
        $data = Yii::$app->request->post();
        $softwareType->attributes = $data;
        if(!$softwareType->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $softwareType->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($typeId){
        SoftwareType::findOne($typeId)->delete();
        $this->redirect(Url::toRoute('software-type/index'));
    }

}
