<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_092510_create_brand_table extends Migration{
    public function up(){
        $this->createTable('blue_brand', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_DATETIME.' NOT NULL',
            'update_time' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
    }

    public function down(){
        $this->dropTable('blue_brand');
        echo "drop table m150322_092510_create_brand_table susscefully.\n";

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
