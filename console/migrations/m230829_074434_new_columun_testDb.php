<?php

use yii\db\Migration;

/**
 * Class m230829_074434_new_columun_testDb
 */
class m230829_074434_new_columun_testDb extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('moms','childrenCount','integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230829_074434_new_columun_testDb cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230829_074434_new_columun_testDb cannot be reverted.\n";

        return false;
    }
    */
}
