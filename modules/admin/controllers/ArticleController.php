<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use app\models\ArticleType;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class ArticleController extends Controller{
    public function actionIndex($typeId=NULL){
        $this->getView()->title = '文章管理';
        list($articles,$pages) = Article::findAllBypage($typeId);
        $typeList = ArticleType::find()->all();
        return $this->render('index',['articles'=>$articles,'pager'=>$pages,'typeList'=>$typeList,'typeId'=>$typeId]);
    }

    public function actionEdit($articleId=null){
        if($articleId){
            $article = Article::findOne($articleId);
        }else{
            $article = New Article();
        }

        $types = ArticleType::find()->all();

        $ajaxUrl = Url::toRoute('article/ajax-save');
        $redirectUrl = Url::toRoute('article/index');

        return $this->render('edit_article',['item'=>$article,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl,'types'=>$types]);
    }

    public function actionSave(){
        $id = Yii::$app->request->post('id');
        if($id){
            $article = Article::findOne($id);
        }else{
            $article = New Article();
        }

        $article->push(Yii::$app->request->post());
        $this->redirect(Url::toRoute('article/index'));
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $article = Article::findOne($id);
        }else{
            $article = New Article();
        }

        if($article->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $article->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $article = new Article();
        $data = Yii::$app->request->post();
        $article->attributes = $data;
        if(!$article->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $article->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($articleId){
        Article::findOne($articleId)->delete();
        $this->redirect(Url::toRoute('article/index'));
    }

}
