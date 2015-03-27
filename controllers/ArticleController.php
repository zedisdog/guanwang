<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 2015/3/27
 * Time: 14:49
 */
namespace app\controllers;

use app\models\Article;
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

    public function actionIndex(){
        list($articles,$pager) = Article::findAllByPage();

        return $this->render('index',['articles'=>$articles,'pager'=>$pager]);
    }

    public function actionDetail($articleId){
        $item = Article::findOne($articleId);
//        $item->view++;
//        $item->save();
        return $this->render('detail',['item'=>$item]);
    }

}