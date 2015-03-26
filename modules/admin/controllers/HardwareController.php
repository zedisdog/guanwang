<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\Brand;
use app\models\BrandModel;
use app\models\Hardware;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class HardwareController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '硬件产品管理';
        list($hardwares,$pages) = Hardware::findAllBypage();
        return $this->render('index',['hardwares'=>$hardwares,'pager'=>$pages]);
    }

    public function actionEdit($hardwareId=null){
        $brands = Brand::find()->all();
        if($hardwareId){
            $hardware = Hardware::findOne($hardwareId);
            $models = BrandModel::find()->where(['brand_id'=>$hardware->brand_id])->all();
        }else{
            $hardware = New Hardware();
            $models = NULL;
        }

        $ajaxUrl = Url::toRoute('hardware/ajax-save');
        $redirectUrl = Url::toRoute('hardware/index');

        return $this->render('edit_hardware',['item'=>$hardware,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl,'brands'=>$brands,'models'=>$models]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $hardware = Hardware::findOne($id);
        }else{
            $hardware = New Hardware();
        }

        if($hardware->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $hardware->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $hardware = new Hardware();
        $data = Yii::$app->request->post();
        $hardware->attributes = $data;
        if(!$hardware->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $hardware->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($hardwareId){
        Hardware::findOne($hardwareId)->delete();
        $this->redirect(Url::toRoute('hardware/index'));
    }

    public function actionAjaxModelList($brandId){
        $models = BrandModel::find()->where(['brand_id'=>$brandId])->orderBy('id DESC')->asArray()->all();
        if($models){
            $r['status'] = 'ok';
            $r['data'] = $models;
        }else{
            $r['status'] = 'error';
        }
        exit(Json::encode($r));
    }

}
