<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%program}}`.
 */
class m230324_141833_create_program_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%program}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%program}}');
    }
}
