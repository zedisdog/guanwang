<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_093114_create_brand_model_table extends Migration{
    public function up(){
        $this->createTable(Yii::$app->db->tablePrefix.'brand_model', [
            'id' => 'pk',
            'brand_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'create_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'update_time' => Schema::TYPE_TIMESTAMP.' NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

    }

    public function down(){
        $this->dropTable(Yii::$app->db->tablePrefix.'brand_model');
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
