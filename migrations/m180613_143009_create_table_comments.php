<?php

use yii\db\Migration;

/**
 * Class m180613_143009_add_table_comments
 */
class m180613_143009_create_table_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'task_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'picture' => $this->string(),
            'picture_small' => $this->string(),
            'created_at' => $this->dateTime()
        ]);

        $this->addForeignKey('fk_comment_user', 'comments', 'user_id', 'users', 'id');
        $this->addForeignKey('fk_comment_task', 'comments', 'user_id', 'task', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comments');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180613_143009_add_table_comments cannot be reverted.\n";

        return false;
    }
    */
}
