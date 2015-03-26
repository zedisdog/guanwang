<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_123826_fill_data_to_hardware extends Migration{
    public function up(){
        for($i=0;$i<100;$i++){
            $data = [
                'title' => 'hardwaretitle'.$i,
                'model_id' => mt_rand(1,400),
                'brand_id' => mt_rand(1,20),
                'summary' => 'summary'.$i,
                'params' => 'param'.$i,
            ];
            $this->insert('{{%hardware}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%hardware}}');

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
