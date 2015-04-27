<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_012054_create_config_table extends Migration{
    public function up(){
        $this->createTable('{{%config}}', [
            'id' => 'pk',
            'about' => Schema::TYPE_TEXT,
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00"',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT default now() on update now()',
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
