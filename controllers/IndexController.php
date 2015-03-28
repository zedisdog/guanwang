<?php

namespace app\controllers;

use app\models\Config;

class IndexController extends \yii\web\Controller{
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
        return $this->render('index');
    }

    public function actionAbout(){
        $about = Config::findOne(1)->about;
        return $this->render('about',['item'=>$about]);
    }

}
