<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 2015/3/27
 * Time: 14:49
 */
namespace app\controllers;

use yii\web\Controller;

class HardwareController extends Controller{
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

}