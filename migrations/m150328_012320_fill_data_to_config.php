<?php

use yii\db\Schema;
use yii\db\Migration;

class m150328_012320_fill_data_to_config extends Migration{
    public function up(){
        $data = [
            'about' => 'about',
            'create_time' => date('Y-m-d H:i:s'),
        ];
        $this->insert('{{%config}}',$data);
    }

    public function down(){
        $this->delete('{{%config}}');

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
