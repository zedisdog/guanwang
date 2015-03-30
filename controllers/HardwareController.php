<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 2015/3/27
 * Time: 14:49
 */
namespace app\controllers;

use app\models\Brand;
use app\models\Hardware;
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

    public function actionIndex($brandId=NULL){
        list($hardwares,$pager) = Hardware::findAllByPage($brandId);

        $brands = Brand::find()->all();

        return $this->render('index',['hardwares'=>$hardwares,'pager'=>$pager,'brands'=>$brands,'brandId'=>$brandId]);
    }

    public function actionDetail($hardwareId){
        $item = Hardware::findOne($hardwareId);
        $brands = Brand::find()->all();
//        $item->view++;
//        $item->save();
        return $this->render('detail',['item'=>$item,'brands'=>$brands]);
    }

}