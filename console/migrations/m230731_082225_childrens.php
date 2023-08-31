<?php

use yii\db\Migration;

/**
 * Class m230731_082225_childrens
 */
class m230731_082225_childrens extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('childrens',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(20),
            'surname'=>$this->string(25),
            'momsID'=>$this->integer()
        ]);

        $this->addForeignKey('fk_moms_ıd','childrens','momsID',
            'moms','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('childrens');
        $this->dropForeignKey('fk_moms_ıd','childrens');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230731_082225_childrens cannot be reverted.\n";

        return false;
    }
    */
}
