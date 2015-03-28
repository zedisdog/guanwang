<?php

namespace app\modules\admin\controllers;

use app\models\Admin;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;

class AdminController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '管理员管理';
        list($admins,$pages) = Admin::findAllBypage();
        return $this->render('index',['admins'=>$admins,'pager'=>$pages]);
    }

    public function actionEdit($adminId=null){
        if($adminId){
            $admin = Admin::findOne($adminId);
        }else{
            $admin = New Admin();
        }

        $ajaxUrl = Url::toRoute('admin/ajax-save');
        $redirectUrl = Url::toRoute('admin/index');

        return $this->render('edit_admin',['item'=>$admin,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $admin = Admin::findOne($id);
        }else{
            $admin = New Admin();
        }

        if($admin->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $admin->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $admin = new Admin();
        $data = Yii::$app->request->post();
        $admin->attributes = $data;
        if(!$admin->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $admin->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($adminId){
        Admin::findOne($adminId)->delete();
        $this->redirect(Url::toRoute('admin/index'));
    }

}
