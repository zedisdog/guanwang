<?php

use yii\db\Schema;
use yii\db\Migration;

class m150327_032431_fill_data_to_enhance extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            for($j=0;$j<20;$j++){
                $data = [
                    'content' => 'enhance-content'.$j,
                    'software_id' => $i+1,
                    'date' => date('Y-m-d'),
                    'create_time' => NULL,
                ];
                $this->insert('{{%enhance}}',$data);
            }
        }
    }

    public function down(){
        $this->delete('{{%enhance}}');

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
