<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\Brand;
use app\models\BrandModel;
use app\models\HardwareType;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class HardwareTypeController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '品牌分类管理';
        //$articles = Article::find()->orderBy('id DESC')->all();
        list($list,$pages) = HardwareType::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($typeId=null){
        if($typeId){
            $hardwareType = HardwareType::findOne($typeId);
        }else{
            $hardwareType = New HardwareType();
        }

        $ajaxUrl = Url::toRoute('hardware-type/ajax-save');
        $redirectUrl = Url::toRoute('hardware-type/index');

        return $this->render('edit_hardware_type',['item'=>$hardwareType,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $hardwareType = HardwareType::findOne($id);
        }else{
            $hardwareType = New HardwareType();
        }

        if($hardwareType->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $hardwareType->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $hardwareType = new HardwareType();
        $data = Yii::$app->request->post();
        $hardwareType->attributes = $data;
        if(!$hardwareType->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $hardwareType->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($typeId){
        HardwareType::findOne($typeId)->delete();
        $this->redirect(Url::toRoute('hardware-type/index'));
    }

}
