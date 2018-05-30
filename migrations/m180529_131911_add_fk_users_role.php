<?php

use yii\db\Migration;

/**
 * Class m180529_131911_add_fk_users_role
 */
class m180529_131911_add_fk_users_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_role', 'users', 'role_id', 'role', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180529_131911_add_fk_users_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_131911_add_fk_users_role cannot be reverted.\n";

        return false;
    }
    */
}
