<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%call_for_application_commune}}`.
 */
class m230325_191626_create_call_for_application_commune_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%call_for_application_commune}}', [
            'id'                      => $this->primaryKey(),
            'call_for_application_id' => $this->integer()->notNull(),
            'commune_id'              => $this->integer()->notNull(),
            'max_grant_application'   => $this->integer()->notNull()->defaultValue(1),
        ]);

        $this->createIndex(
            'call_for_application_commune_unique_commune_id',
            '{{%call_for_application_commune}}',
            ['call_for_application_id', 'commune_id'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%call_for_application_commune}}');
    }
}
