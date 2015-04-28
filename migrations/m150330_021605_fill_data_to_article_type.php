<?php

use yii\db\Schema;
use yii\db\Migration;

class m150330_021605_fill_data_to_article_type extends Migration{
    public function up(){
        for($i=0;$i<2;$i++){
            $data = [
                'title' => 'article_type'.$i,
                'create_time' => NULL,
            ];
            $this->insert('{{%article_type}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%article_type}}');

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
