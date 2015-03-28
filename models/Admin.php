<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $password
 * @property string $create_time
 * @property string $update_time
 * @property string $last_login
 */
class Admin extends ActiveRecord implements IdentityInterface{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                [
                    'user_name',
                    'password'
                ],
                'required'
            ],
            [
                [
                    'create_time',
                    'update_time',
                    'last_login'
                ],
                'safe'
            ],
            [
                [
                    'user_name',
                    'password'
                ],
                'string',
                'max' => 255
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'user_name' => '账户名',
            'password' => '密码',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'last_login' => 'Last Login',
        ];
    }

    public static function findIdentity($username){
        return static::findOne(['user_name' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        return null;
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthKey(){
        return null;
    }

    public function validateAuthKey($authKey){
        return null;
    }

    public function validatePassword($password){
        return $this->password == md5($password);
    }

    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($pageSize=10){
        $query = static::find()->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>$pageSize]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();
        return [$articles,$pages];
    }

    /**
     * 添加数据或更新数据
     * @param $data
     * @return bool
     */
    public function push($data){
        if($data['pass']==$data['pass2']){
            $data['password'] = md5($data['pass']);
        }else{
            $this->addError('password','两次输入的密码不相同');
            return false;
        }
        $this->dealData($data);
        $this->attributes = $data;
        return $this->save();
    }

    /**
     * 处理数据
     * 判断新建或更新，并使用不同的操作
     * @param $data
     */
    public function dealData(&$data){
        if(!$this->isNewRecord){
            $this->update_time = date('Y-m-d H:i:s');
        }
    }
}
