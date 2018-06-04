<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 */
class m180601_141205_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->date()->notNull(),
            'description' => $this->text(),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_task_user', 'task', 'user_id', 'users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
    }
}
