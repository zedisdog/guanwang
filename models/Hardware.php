<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%hardware}}".
 *
 * @property integer $id
 * @property string $image
 * @property string $title
 * @property integer $model_id
 * @property integer $brand_id
 * @property string $price
 * @property string $summary
 * @property string $params
 * @property string $view
 * @property string $create_time
 * @property string $update_time
 */
class Hardware extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%hardware}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                [
                    'title',
                    'model_id',
                    'brand_id',
                    'summary',
                    'params',
                    'image'
                ],
                'required'
            ],
            [
                [
                    'model_id',
                    'brand_id',
                    'view'
                ],
                'integer'
            ],
            [
                [
                    'summary',
                    'params',
                    'image'
                ],
                'string'
            ],
            [
                [
                    'create_time',
                    'update_time'
                ],
                'safe'
            ],
            [
                [
                    'title',
                    'price',
                    'image'
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
            'image' => '封面图片',
            'title' => '标题',
            'model_id' => '型号',
            'brand_id' => '品牌',
            'price' => '价格',
            'summary' => '简介',
            'params' => '详情',
            'view' => '浏览数',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }


    /**
     * 关联品牌
     * @return \yii\db\ActiveQuery
     */
    public function getBrand(){
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * 关联型号
     * @return \yii\db\ActiveQuery
     */
    public function getModel(){
        return $this->hasOne(BrandModel::className(), ['id' => 'model_id']);
    }

    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($brandId=NULL,$modelId=NULL,$pageSize = 10){
        if($brandId){
            $condition['brand_id'] = $brandId;
        }
        if($modelId){
            $condition['model_id'] = $modelId;
        }
        if(!isset($condition)){
            $condition = NULL;
        }
        $query = static::find()->orderBy('id DESC')->with(['model','brand'])->where($condition);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $pageSize
        ]);
        $types = $query->offset($pages->offset)->limit($pages->limit)->all();
        return [
            $types,
            $pages
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
        }else{
            $this->create_time = date('Y-m-d H:i:s');
        }
        $web = Yii::getAlias('@web');
        $webroot = Yii::getAlias('@webroot');
        if(strpos($data['image'],'/')===false){
            copy($webroot.'/assets/images/'.$data['image'],$webroot.'/upload/hardware_images/'.$data['image']);
            $data['image'] = $web.'/upload/hardware_images/'.$data['image'];
        }
    }
}
