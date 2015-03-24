<?php

namespace app\models;

use Yii;
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
            'user_name' => 'User Name',
            'password' => 'Password',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'last_login' => 'Last Login',
        ];
    }

    public static function findIdentity($username){
        return static::findOne(['user_name'=>$username]);
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
        return $this->password==md5($password);
    }
}
