<?php

use yii\db\Migration;

/**
 * Class m230731_090429_categories
 */
class m230731_090429_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categories',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(20),
        ]);
        $this->createTable('prodcuts_and_category',[
            'productId'=>$this->integer(),
            'categoriId'=>$this->integer()
            ]);

        $this->addForeignKey('fk_category','prodcuts_and_category','categoriId'
        ,'categories',
        'id');
        $this->addForeignKey('fk_products','prodcuts_and_category','productId'
        ,'producs','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230731_090429_categories cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230731_090429_categories cannot be reverted.\n";

        return false;
    }
    */
}
