<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property integer $id
 * @property string $about
 * @property string $create_time
 * @property string $update_time
 */
class Config extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                ['about'],
                'string'
            ],
            [
                [
                    'create_time',
                    'update_time'
                ],
                'safe'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'about' => '关于我们',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * 添加数据或更新数据
     * @param $data
     * @return bool
     */
    public function push($data){
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
