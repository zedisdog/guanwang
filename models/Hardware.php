<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hardware}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $model_id
 * @property integer $brand_id
 * @property string $price
 * @property string $summary
 * @property string $params
 * @property string $create_time
 * @property string $update_time
 */
class Hardware extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%hardware}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'model_id', 'brand_id', 'summary', 'params'], 'required'],
            [['model_id', 'brand_id'], 'integer'],
            [['summary', 'params'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'price'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'model_id' => 'Model ID',
            'brand_id' => 'Brand ID',
            'price' => 'Price',
            'summary' => 'Summary',
            'params' => 'Params',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
