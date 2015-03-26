<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\Brand;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class BrandController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '品牌管理';
        //$articles = Article::find()->orderBy('id DESC')->all();
        list($list,$pages) = Brand::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($brandId=null){
        if($brandId){
            $brand = Brand::findOne($brandId);
        }else{
            $brand = New Brand();
        }

        $ajaxUrl = Url::toRoute('brand/ajax-save');
        $redirectUrl = Url::toRoute('brand/index');

        return $this->render('edit_brand',['item'=>$brand,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $brand = Brand::findOne($id);
        }else{
            $brand = New Brand();
        }

        if($brand->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $brand->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $brand = new Brand();
        $data = Yii::$app->request->post();
        $brand->attributes = $data;
        if(!$brand->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $brand->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($brandId){
        Brand::findOne($brandId)->delete();
        $this->redirect(Url::toRoute('brand/index'));
    }

}
