<?php

use yii\db\Migration;

/**
 * Class m180611_191907_users_add_email
 */
class m180611_191907_users_add_email extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users', 'email', $this->string(100)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('users', 'email');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180611_191907_users_add_email cannot be reverted.\n";

        return false;
    }
    */
}
