<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_024930_create_software_type_table extends Migration{
    public function up(){
        $this->createTable('blue_software_type', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_DATETIME.' NOT NULL',
            'update_time' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
    }

    public function down(){
        $this->dropTable('blue_software_type');
        echo "drop table m150321_024930_create_software_type_table susscefully.\n";

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
