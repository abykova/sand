<?php

use yii\db\Migration;

/**
 * Class m201115_142048_test
 */
class m201115_142048_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201115_142048_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201115_142048_test cannot be reverted.\n";

        return false;
    }
    */
}
