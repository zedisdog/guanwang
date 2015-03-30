<?php

namespace app\modules\admin\controllers;

use app\helpers\DiyHelper;
use app\models\Software;
use app\models\SoftwareType;
use \app\modules\admin\controllers\BaseController as Controller;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\UploadedFile;

class SoftwareController extends Controller{
    public function actionIndex($typeId=NULL){
        $this->getView()->title = '软件产品管理';
        list($softwares,$pages) = Software::findAllBypage($typeId);
        $types = SoftwareType::find()->all();
        return $this->render('index',['softwares'=>$softwares,'pager'=>$pages,'types'=>$types,'typeId'=>$typeId]);
    }

    public function actionEdit($softwareId=null){
        $types = SoftwareType::find()->all();
        if($softwareId){
            $software = Software::findOne($softwareId);
        }else{
            $software = New Software();
        }

        $ajaxUrl = Url::toRoute('software/ajax-save');
        $redirectUrl = Url::toRoute('software/index');

        return $this->render('edit_software',['item'=>$software,'ajaxUrl'=>$ajaxUrl,'redirectUrl'=>$redirectUrl,'types'=>$types]);
    }

    public function actionAjaxSave(){
        $id = Yii::$app->request->post('id');
        $r = [];
        if($id){
            $software = Software::findOne($id);
        }else{
            $software = New Software();
        }

        if($software->push(Yii::$app->request->post())){
            $r['status'] = 'ok';
        }else{
            $r['status']='error';
            $r['data'] = $software->getFirstErrors();
        }

        exit(Json::encode($r));
    }

    public function actionAjaxValidate(){
        $r = [];
        $software = new Software();
        $data = Yii::$app->request->post();
        $software->attributes = $data;
        if(!$software->validate(array_keys($data))){
            $r['status'] = 'error';
            $r['data'] = $software->getFirstErrors();
        }else{
            $r['status'] = 'ok';
        }

        exit(Json::encode($r));
    }

    public function actionDel($softwareId){
        Software::findOne($softwareId)->delete();
        $this->redirect(Url::toRoute('software/index'));
    }

    public function actionAjaxUpLoadImage(){
        $image = UploadedFile::getInstanceByName('pic');
        $urlPath = Yii::getAlias('@web/assets/images/');
        $rootPath = Yii::getAlias('@webroot/assets/images/');
        $imageName = DiyHelper::createGuid().'.'.$image->extension;
        $imageUrl = $urlPath.$imageName;
        $imagePath = $rootPath.$imageName;
        if($image->saveAs($imagePath)){
            $r['status']='ok';
            $r['data'] = ['imageUrl'=>$imageUrl,'imageName'=>$imageName];
        }else{
            $r['status'] = 'error';
        }
        exit(Json::encode($r));
    }

}
