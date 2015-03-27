<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%enhance}}".
 *
 * @property integer $id
 * @property integer $software_id
 * @property string $content
 * @property string $date
 * @property string $create_time
 * @property string $update_time
 */
class Enhance extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%enhance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(){
        return [
            [
                [
                    'software_id',
                    'date',
                    'content'
                ],
                'required'
            ],
            [
                ['software_id'],
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
                ['content','date'],
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
            'software_id' => '所属软件系统',
            'content' => '内容',
            'date' => '系统更新时间',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($softwareId,$pageSize = 10){
        $query = static::find()->orderBy('id DESC')->where(['software_id'=>$softwareId]);
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
