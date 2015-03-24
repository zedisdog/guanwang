<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%brand}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $create_time
 * @property string $update_time
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Title',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
