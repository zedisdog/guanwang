<?php

namespace app\modules\admin\controllers;

use app\models\Admin;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;

class DefaultController extends Controller{
    public function actionLogout(){
        unset(Yii::$app->session['admin']);
        $this->redirect(Url::toRoute('default/login'));
    }

    public function actionLogin(){
        return $this->renderPartial('login');
    }

    public function actionAjaxDoLogin(){
        if(Yii::$app->request->isAjax){
            $user = Admin::findIdentity(Yii::$app->request->post('username'));
            if($user->validatePassword(Yii::$app->request->post('password'))){
                Yii::$app->session['admin'] = $user->attributes;
                $r = ['status'=>'ok'];
            }else{
                $r = ['status' => 'error'];
            }
        }else{
            $r = ['status'=>'error'];
        }

        return Json::encode($r);
    }
}
