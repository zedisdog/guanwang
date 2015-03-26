<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_082653_fill_data_to_brand extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            $data = [
                'title' => 'title'.$i,
            ];
            $this->insert('{{%brand}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%brand}}');

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
