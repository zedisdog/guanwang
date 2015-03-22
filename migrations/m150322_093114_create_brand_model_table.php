<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_093114_create_brand_model_table extends Migration{
    public function up(){
        $this->createTable('blue_brand_model', [
            'id' => 'pk',
            'brand_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_DATETIME.' NOT NULL',
            'update_time' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);

    }

    public function down(){
        $this->dropTable('blue_brand_model');
        echo "drop table m150322_093114_create_brand_model_table susscefully.\n";

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
