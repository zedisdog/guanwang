<?php

use yii\db\Schema;
use yii\db\Migration;

class m150327_020218_fill_data_to_software extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            for($j=0;$j<20;$j++){
                $data = [
                    'title' => 'software-title'.$j,
                    'image' => '/images/example_img.png',
                    'type_id' => $i+1,
                    'content' => 'content'.$j,
                    'create_time' => NULL,
                ];
                $this->insert('{{%software}}',$data);
            }
        }
    }

    public function down(){
        $this->delete('{{%software}}');

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
