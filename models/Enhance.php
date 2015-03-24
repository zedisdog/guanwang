<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%enhance}}".
 *
 * @property integer $id
 * @property integer $software_id
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 */
class Enhance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%enhance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['software_id', 'content'], 'required'],
            [['software_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['content'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'software_id' => 'Software ID',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
