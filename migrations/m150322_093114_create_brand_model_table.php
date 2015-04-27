<?php
/**
 * 硬件产品属于商标的型号表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150322_093114_create_brand_model_table extends Migration{
    public function up(){
        $this->createTable('{{%brand_model}}', [
            'id' => 'pk',
            'brand_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00" ON INSERT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now() ON UPDATE now()',
        ]);

    }

    public function down(){
        $this->dropTable('{{%brand_model}}');
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
