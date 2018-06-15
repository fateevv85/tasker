<?php

use yii\db\Migration;

/**
 * Class m180615_140333_drop_column_comments
 */
class m180615_140333_drop_column_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('comments', 'picture_small');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('comments', 'picture_small', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180615_140333_drop_column_comments cannot be reverted.\n";

        return false;
    }
    */
}
