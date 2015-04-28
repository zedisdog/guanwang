<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property string $article_type
 * @property string $title
 * @property string $source
 * @property string $source_url
 * @property integer $view
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class Article extends \yii\db\ActiveRecord{
    /**
     * @inheritdoc
     */
    public static function tableName(){
        return '{{%article}}';
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
                    'article_type'
                ],
                'required'
            ],
            [
                ['view'],
                'integer'
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
                    'source',
                    'source_url'
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
            'article_type' => '文章分类',
            'title' => '标题',
            'source' => '来源',
            'source_url' => '来源 Url',
            'view' => 'View',
            'content' => '内容',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
        ];
    }


    /**
     * 分页封装
     * @param int $pageSize
     * @return array
     */
    public static function findAllByPage($typeId=NULL,$pageSize = 10){
        if($typeId){
            $condition = ['article_type'=>$typeId];
        }else{
            $condition = NULL;
        }
        $query = static::find()->orderBy('id DESC')->where($condition);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => $pageSize
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();
        return [
            $articles,
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
    }
}
