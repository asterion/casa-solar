<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%call_for_application}}`.
 */
class m230325_105941_create_call_for_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call_for_application}}', [
            'id'                    => $this->primaryKey(),
            'program_id'            => $this->integer()->notNull(),
            'active'                => $this->boolean()->notNull()->defaultValue(true),
            'max_grant_application' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createIndex(
            'idx-call_for_application-program_id',
            'call_for_application',
            'program_id'
        );

        $this->addForeignKey(
            'fk-call_for_application-program_id',
            'call_for_application',
            'program_id',
            'program',
            'id',
            'CASCADE'
        );

        $sql = 'INSERT INTO {{%call_for_application}} SELECT NULL AS id, id AS program_id, 1 AS active, 100 AS max_grant_application FROM program ORDER BY id DESC LIMIT 0, 25';

        $results = $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-call_for_application-program_id',
            'call_for_application'
        );

        $this->dropIndex(
            'idx-call_for_application-program_id',
            'call_for_application'
        );

        $this->dropTable('{{%call_for_application}}');
    }
}
