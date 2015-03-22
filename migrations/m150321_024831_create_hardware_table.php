<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_024831_create_hardware_table extends Migration{
    public function up(){
        $this->createTable('blue_hardware', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'model_id' => Schema::TYPE_INTEGER.' NOT NULL',        //型号ID
            'brand_id' => Schema::TYPE_INTEGER.' NOT NULL',        //品牌ID
            'price' => Schema::TYPE_STRING.' NOT NULL',         //价格
            'summary' => Schema::TYPE_TEXT.' NOT NULL',         //概述
            'params' => Schema::TYPE_TEXT.' NOT NULL',          //参数
            'create_time' => Schema::TYPE_DATETIME.' NOT NULL',
            'update_time' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
    }

    public function down(){
        $this->dropTable('blue_hardware');
        echo "drop table m150321_024831_create_hardware_table susscefully.\n";

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
