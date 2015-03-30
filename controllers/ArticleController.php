<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 2015/3/27
 * Time: 14:49
 */
namespace app\controllers;

use app\models\Article;
use app\models\ArticleType;
use yii\web\Controller;

class ArticleController extends Controller{
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex($typeId=NULL){
        list($articles,$pager) = Article::findAllByPage($typeId);
        $types = ArticleType::find()->all();

        return $this->render('index',['articles'=>$articles,'pager'=>$pager,'types'=>$types,'typeId'=>$typeId]);
    }

    public function actionDetail($articleId){
        $item = Article::findOne($articleId);
//        $item->view++;
//        $item->save();
        return $this->render('detail',['item'=>$item]);
    }

}