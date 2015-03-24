<?php

namespace app\modules\admin\controllers;

use app\modules\admin\controllers\BaseController as Controller;

class IndexController extends Controller{
    public function actionIndex(){
        $this->getView()->title = '首页';
        return $this->render('index');
    }
}
