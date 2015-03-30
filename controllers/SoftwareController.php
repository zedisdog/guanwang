<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 2015/3/27
 * Time: 14:49
 */
namespace app\controllers;

use app\models\Enhance;
use app\models\Software;
use app\models\SoftwareType;
use yii\web\Controller;

class SoftwareController extends Controller{
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
        list($softwares,$pager) = Software::findAllByPage($typeId);

        $types = SoftwareType::find()->all();

        return $this->render('index',['softwares'=>$softwares,'pager'=>$pager,'types'=>$types,'typeId'=>$typeId]);
    }

    public function actionDetail($softwareId){
        $item = Software::findOne($softwareId);
        $types = SoftwareType::find()->all();
//        $item->view++;
//        $item->save();
        return $this->render('detail',['item'=>$item,'types'=>$types]);
    }

    public function actionEnhanceList($softwareId){
        list($enhanceList,$pager) = Enhance::findAllByPage($softwareId);
        return $this->render('enhance_list',['list'=>$enhanceList,'pager'=>$pager]);
    }

}