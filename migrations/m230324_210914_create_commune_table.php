<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%commune}}`.
 */
class m230324_210914_create_commune_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%commune}}', [
            'id'   => $this->primaryKey(),
            'name' => $this->string('32')->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%commune}}');
    }
}
