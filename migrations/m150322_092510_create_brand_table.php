<?php
/**
 * 硬件产品商标表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150322_092510_create_brand_table extends Migration{
    public function up(){
        $this->createTable('{{%brand}}', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00"',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT default now() on update now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%brand}}');
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
