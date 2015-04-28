<?php

use yii\db\Schema;
use yii\db\Migration;

class m150324_082901_fill_data_to_article extends Migration{
    public function up(){
        for($i=0;$i<20;$i++){
            $data = [
                'title' => 'title'.$i,
                'article_type' => mt_rand(1,2),
                'source' => 'source'.$i,
                'source_url' => 'http://www.'.$i.'.com',
                'content' => 'content'.$i,
                'create_time' => date('Y-m-d H:i:s'),
            ];
            $this->insert('{{%article}}',$data);
        }
    }

    public function down(){
        $this->delete('{{%article}}');

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
