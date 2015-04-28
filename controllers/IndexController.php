<?php

namespace app\controllers;

use app\models\Config;
use app\models\Hardware;
use app\models\Software;

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
        $software = Software::find()->orderBy('view DESC')->limit(3)->all();
        $hardware = Hardware::find()->orderBy('view DESC')->limit(3)->all();

        return $this->render('index',['software'=>$software,'hardware'=>$hardware]);
    }

    public function actionAbout(){
        $about = Config::findOne(1)->about;
        return $this->render('about',['item'=>$about]);
    }

}
