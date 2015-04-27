<?php
/**
 * 软件产品类型表
 */

use yii\db\Schema;
use yii\db\Migration;

class m150321_024930_create_software_type_table extends Migration{
    public function up(){
        $this->createTable('{{%software_type}}', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now()',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT now() ON UPDATE now()',
        ]);
    }

    public function down(){
        $this->dropTable('{{%software_type}}');
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
