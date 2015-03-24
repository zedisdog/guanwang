<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use \app\modules\admin\controllers\BaseController as Controller;

class ArticleController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '文章管理';
        //$articles = Article::find()->orderBy('id DESC')->all();
        list($articles,$pages) = Article::findAllBypage();
        return $this->render('index',['articles'=>$articles,'pager'=>$pages]);
    }

    public function actionEdit($articleId=null){
        if($articleId){
            $article = Article::findOne($articleId);
        }else{
            $article = New Article();
        }

        return $this->render('edit_article',['item'=>$article]);
    }

    public function actionSave(){

    }

}
