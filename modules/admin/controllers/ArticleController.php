<?php

namespace app\modules\admin\controllers;

use \app\modules\admin\controllers\BaseController as Controller;

class ArticleController extends Controller{
    public function actionIndex(){
        return $this->render('index');
    }

}
