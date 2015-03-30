<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%article_type}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class ArticleType extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%article_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
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
            'title' => 'Title',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($pageSize=10){
        $query = static::find()->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize'=>$pageSize]);
        $types = $query->offset($pages->offset)->limit($pages->limit)->all();
        return [$types,$pages];
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
