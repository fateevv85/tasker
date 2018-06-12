<?php

use yii\db\Migration;

/**
 * Class m180611_141546_task_add_columns
 */
class m180611_141546_task_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'created_at', $this->dateTime());
        $this->addColumn('task', 'updated_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'created_at');
        $this->dropColumn('task', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180611_141546_task_add_columns cannot be reverted.\n";

        return false;
    }
    */
}
