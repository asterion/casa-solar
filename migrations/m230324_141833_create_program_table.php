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

        foreach (range(1, 15) as $value) {
            $this->insert('{{%program}}', [
                'name' => sprintf('Programa #%04d', $value),
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%program}}');
    }
}
