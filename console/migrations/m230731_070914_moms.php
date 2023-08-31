<?php

use yii\db\Migration;

/**
 * Class m230731_070914_moms
 */
class m230731_070914_moms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('moms',[
            'id' => $this->primaryKey(),
            'name'=> $this->string(20),
            'surname'=>$this->string(25),
            'file'=>$this->string(50),
            'fileName'=>$this->string(50),
            'childrenCount'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('moms');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230731_070914_moms cannot be reverted.\n";

        return false;
    }
    */
}
