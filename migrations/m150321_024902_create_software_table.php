<?php
/**
 * 软件产品表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150321_024902_create_software_table extends Migration{
    public function up(){
        $this->createTable(Yii::$app->db->tablePrefix.'software', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'price' => Schema::TYPE_STRING.' NOT NULL',         //价格
            'content' => Schema::TYPE_TEXT.' NOT NULL',         //描述
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    public function down(){
        $this->dropTable(Yii::$app->db->tablePrefix.'software');
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
