<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_012054_create_config_table extends Migration{
    public function up(){
        $this->createTable('{{%config}}', [
            'id' => 'pk',
            'about' => Schema::TYPE_TEXT,
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00" ON INSERT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now() ON UPDATE now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%config}}');
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
