<?php
/**
 * 硬件产品表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150321_024831_create_hardware_table extends Migration{
    public function up(){
        $this->createTable('{{%hardware}}', [
            'id' => 'pk',
            'image' => Schema::TYPE_STRING . ' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'model_id' => Schema::TYPE_INTEGER.' NOT NULL',             //型号ID
            'brand_id' => Schema::TYPE_INTEGER.' NOT NULL',             //品牌ID
            'price' => Schema::TYPE_STRING.' NOT NULL DEFAULT 0',       //价格
            'summary' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',      //概述
            'params' => Schema::TYPE_TEXT.' NOT NULL DEFAULT ""',       //参数
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00" ON UPDATE now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%hardware}}');
        return true;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
