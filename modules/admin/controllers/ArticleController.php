<?php

namespace app\modules\admin\controllers;

use app\models\Article;
use \app\modules\admin\controllers\BaseController as Controller;

class ArticleController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '文章管理';
        $articles = Article::find()->orderBy('id DESC')->all();
        return $this->render('index',['articles'=>$articles]);
    }

}
