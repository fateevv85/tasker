<?php

use yii\db\Migration;

/**
 * Class m180617_113817_task_remove_column
 */
class m180617_113817_task_remove_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_task_comment_id', 'task');
        $this->dropColumn('task', 'comment_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('task', 'comment_id', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180617_113817_task_remove_column cannot be reverted.\n";

        return false;
    }
    */
}
