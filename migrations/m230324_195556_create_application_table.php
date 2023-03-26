<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%grant_application}}`.
 */
class m230324_195556_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%postulation}}');

        $this->createTable('{{%grant_application}}', [
            'id'         => $this->primaryKey(),
            'program_id' => $this->integer()->notNull(),
            'email'      => $this->string()->notNull()->unique(),
        ]);

        $this->createIndex(
            'idx-grant_application-program_id',
            'grant_application',
            'program_id'
        );

        $this->addForeignKey(
            'fk-grant_application-program_id',
            'grant_application',
            'program_id',
            'program',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-grant_application-program_id',
            'grant_application'
        );

        $this->dropIndex(
            'idx-grant_application-program_id',
            'grant_application'
        );

        $this->dropTable('{{%grant_application}}');
    }
}
