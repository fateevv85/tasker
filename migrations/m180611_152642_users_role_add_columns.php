<?php

use yii\db\Migration;

/**
 * Class m180611_152642_user
 */
class m180611_152642_users_role_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'created_at', $this->dateTime());
        $this->addColumn('users', 'updated_at', $this->dateTime());
        $this->addColumn('role', 'created_at', $this->dateTime());
        $this->addColumn('role', 'updated_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'created_at');
        $this->dropColumn('users', 'updated_at');
        $this->dropColumn('role', 'created_at');
        $this->dropColumn('role', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180611_152642_user cannot be reverted.\n";

        return false;
    }
    */
}
