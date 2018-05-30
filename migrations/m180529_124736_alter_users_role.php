<?php

use yii\db\Migration;

/**
 * Class m180529_124736_alter_users_role
 */
class m180529_124736_alter_users_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('users', 'role', 'role_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('users','role_id', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_124736_alter_users_role cannot be reverted.\n";

        return false;
    }
    */
}
