<?php

namespace app\modules\admin\controllers;

use app\models\ArticleType;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class ArticleTypeController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '软件分类管理';
        list($list,$pages) = ArticleType::findAllBypage();
        return $this->render('index',['list'=>$list,'pager'=>$pages]);
    }

    public function actionEdit($typeId=null){
        if($typeId){
            $articleType = ArticleType::findOne($typeId);
        }else{
            $articleType = New ArticleType();
        }

        $ajaxUrl = Url::toRoute('article-type/ajax-save');
        $redirectUrl = Url::toRoute('article-type/index');

        return $this->render('edit_article_type',['item'=>$articleType,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $articleType = ArticleType::findOne($id);
        }else{
            $articleType = New ArticleType();
        }

        if($articleType->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $articleType->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $articleType = new ArticleType();
        $data = Yii::$app->request->post();
        $articleType->attributes = $data;
        if(!$articleType->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $articleType->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($typeId){
        ArticleType::findOne($typeId)->delete();
        $this->redirect(Url::toRoute('article-type/index'));
    }

}
