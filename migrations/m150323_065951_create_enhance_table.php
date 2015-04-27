<?php
/**
 * 软件系统增强日志表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150323_065951_create_enhance_table extends Migration{
    public function up(){
        $this->createTable('{{%enhance}}', [
            'id' => 'pk',
            'software_id' => Schema::TYPE_INTEGER.' NOT NULL',                              //软件产品id
            'content' => Schema::TYPE_STRING.' NOT NULL',
            'date' => Schema::TYPE_DATE. ' NOT NULL',                                       //更新时间
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT "0000-00-00 00:00:00" ON INSERT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now() ON UPDATE now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%enhance}}');
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
