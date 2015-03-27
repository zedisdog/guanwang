<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%software}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $type_id
 * @property string $price
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class Software extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%software}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                [
                    'title',
                    'content',
                    'type_id'
                ],
                'required'
            ],
            [
                ['content'],
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
                    'price'
                ],
                'string',
                'max' => 255
            ],
            [
                'type_id',
                'integer',
                'max' => 11
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'title' => '标题',
            'type_id' => '类型',
            'price' => '价格',
            'content' => '内容',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * 关联类型
     * @return \yii\db\ActiveQuery
     */
    public function getType(){
        return $this->hasOne(SoftwareType::className(), ['id' => 'type_id']);
    }

    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($pageSize = 10){
        $query = static::find()->orderBy('id DESC')->with('type');
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
        }
    }
}
