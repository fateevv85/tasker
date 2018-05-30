<?php

use yii\db\Migration;

/**
 * Class m180529_125804_alter_role_title
 */
class m180529_125804_alter_role_title extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('role', 'title', 'role');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180529_125804_alter_role_title cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_125804_alter_role_title cannot be reverted.\n";

        return false;
    }
    */
}
