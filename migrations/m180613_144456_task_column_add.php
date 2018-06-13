<?php

use yii\db\Migration;

/**
 * Class m180613_144456_task_column_add
 */
class m180613_144456_task_column_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'comment_id', $this->integer());

        $this->addForeignKey('fk_task_comment_id', 'task', 'comment_id', 'comments', 'id');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'comment_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180613_144456_task_column_add cannot be reverted.\n";

        return false;
    }
    */
}
