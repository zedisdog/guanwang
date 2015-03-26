<?php

use yii\db\Schema;
use yii\db\Migration;

class m150326_084437_fill_data_to_brand_model extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            for($j=0;$j<20;$j++){
                $data = [
                    'title' => 'model-title'.$j,
                    'brand_id' => $i,
                ];
                $this->insert('{{%brand_model}}',$data);
            }
        }
    }

    public function down(){
        $this->delete('{{%brand_model}}');

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
