<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%call_for_application_stage}}`.
 */
class m230326_132617_create_call_for_application_stage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call_for_application_stage}}', [
            'id'       => $this->primaryKey(),
            'name'     => $this->string()->notNull()->unique(),
            'position' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%call_for_application_stage}}');
    }
}
