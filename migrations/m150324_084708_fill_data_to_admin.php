<?php

use yii\db\Schema;
use yii\db\Migration;

class m150324_084708_fill_data_to_admin extends Migration{
    public function up(){
        $data = [
            'user_name' => 'admin',
            'password' => '202cb962ac59075b964b07152d234b70',
            'create_time' => NULL,
        ];
        $this->insert('{{%admin}}',$data);
    }

    public function down(){
        $this->delete('{{%admin}}');
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
