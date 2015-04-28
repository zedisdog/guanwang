<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%brand_model}}".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class BrandModel extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%brand_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                [
                    'brand_id',
                    'title'
                ],
                'required'
            ],
            [
                ['brand_id'],
                'integer'
            ],
            [
                [
                    'create_time',
                    'update_time'
                ],
                'safe'
            ],
            [
                ['title'],
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
            'brand_id' => '品牌id',
            'title' => '标题',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * 分页封装
     * @param null $brand_id
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($brandId=NULL,$pageSize=10){
        if($brandId){
            $condition = ['brand_id'=>$brandId];
        }else{
            $condition = NULL;
        }
        $query = static::find()->where($condition)->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>$pageSize]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        return [$models,$pages];
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
        }else{
            $this->create_time = date('Y-m-d H:i:s');
        }
    }
}
