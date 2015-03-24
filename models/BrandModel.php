<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%brand_model}}".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class BrandModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand_model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_id', 'title'], 'required'],
            [['brand_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'title' => 'Title',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
