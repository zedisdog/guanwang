<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\Brand;
use app\models\BrandModel;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class BrandModelController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '品牌型号管理';
        //$articles = Article::find()->orderBy('id DESC')->all();
        list($list,$pages) = BrandModel::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($modelId=null){

        $brands = Brand::find()->all();

        if($modelId){
            $brandModel = BrandModel::findOne($modelId);
        }else{
            $brandModel = New BrandModel();
        }

        $ajaxUrl = Url::toRoute('brand-model/ajax-save');
        $redirectUrl = Url::toRoute('brand-model/index');

        return $this->render('edit_brand_model',['item'=>$brandModel,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl,'brands'=>$brands]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $brandModel = BrandModel::findOne($id);
        }else{
            $brandModel = New BrandModel();
        }

        if($brandModel->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $brandModel->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $brandModel = new BrandModel();
        $data = Yii::$app->request->post();
        $brandModel->attributes = $data;
        if(!$brandModel->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $brandModel->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($modelId){
        BrandModel::findOne($modelId)->delete();
        $this->redirect(Url::toRoute('brand-model/index'));
    }

}
