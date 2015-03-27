<?php

use yii\db\Schema;
use yii\db\Migration;

class m150327_013637_fill_data_to_software_type extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            $data = [
                'title' => 'software-type'.$i,
            ];
            $this->insert('{{%software_type}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%software_type}}');

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
