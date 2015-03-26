<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_091532_fill_data_to_hardware_type extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            $data = [
                'title' => 'typetitle'.$i,
            ];
            $this->insert('{{%hardware_type}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%hardware_type}}');

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
