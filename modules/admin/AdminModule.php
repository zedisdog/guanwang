<?php

namespace app\modules\admin;

use Yii;
use yii\web\Controller;

class AdminModule extends \yii\base\Module{
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'main';

    public function init(){
        parent::init();

        // custom initialization code goes here
    }
}
