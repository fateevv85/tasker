<?php

use yii\db\Migration;

/**
 * Class m180529_125337_alter_test_to_role
 */
class m180529_125337_alter_test_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameTable('test', 'role');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180529_125337_alter_test_to_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_125337_alter_test_to_role cannot be reverted.\n";

        return false;
    }
    */
}
