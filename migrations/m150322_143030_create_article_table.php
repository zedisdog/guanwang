<?php
/**
 * 新闻表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150322_143030_create_article_table extends Migration{
    public function up(){
        $this->createTable('{{%article}}', [
            'id' => 'pk',
            'article_type' => Schema::TYPE_INTEGER.' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'source' => Schema::TYPE_STRING,
            'source_url' => Schema::TYPE_STRING,
            'view' => Schema::TYPE_INTEGER. ' NOT NULL DEFAULT 0',
            'content' => 'longtext NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00"',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT default now() on update now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%article}}');
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
