<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_024941_create_hardware_type_table extends Migration{
    public function up(){
        $this->createTable('hardware_type', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_DATETIME.' NOT NULL',
            'update_time' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
    }

    public function down(){
        $this->dropTable('hardware_type');
        echo "drop table m150321_024941_create_hardware_type_table.\n";

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
