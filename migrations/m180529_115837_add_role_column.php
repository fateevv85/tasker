<?php

use yii\db\Migration;

/**
 * Class m180529_115837_add_role_column
 */
class m180529_115837_add_role_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'role', $this->integer());
//        $this->addColumn('users', 'role', $this->string(50));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_115837_add_role_column cannot be reverted.\n";

        return false;
    }
    */
}
