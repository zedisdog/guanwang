<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_021222_create_article_type_table extends Migration{
    public function up(){
        $this->createTable('{{%article_type}}', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING,
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00"',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT default now() on update now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%article_type}}');
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
