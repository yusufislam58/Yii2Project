<?php

use yii\db\Migration;

/**
 * Class m230731_090402_products
 */
class m230731_090402_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('producs',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(40),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230731_090402_products cannot be reverted.\n";

        return false;
    }
    */
}
