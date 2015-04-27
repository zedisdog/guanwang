<?php

use yii\db\Schema;
use yii\db\Migration;

class m150324_020137_create_admin_table extends Migration{
    public function up(){
        $this->createTable('{{%admin}}', [
            'id' => 'pk',
            'user_name' => Schema::TYPE_STRING.' NOT NULL',
            'password' => Schema::TYPE_STRING.' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'last_login' => Schema::TYPE_TIMESTAMP,
        ]);
    }

    public function down(){
        $this->dropTable('{{%admin}}');
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
