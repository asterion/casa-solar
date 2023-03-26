<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%grant_application}}`.
 */
class m230324_215221_add_commune_id_column_to_grant_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%grant_application}}', 'commune_id', $this->integer()->notNull());

        $this->createIndex(
            'idx-grant_application-commune_id',
            'grant_application',
            'commune_id'
        );

        $this->addForeignKey(
            'fk-grant_application-commune_id',
            'grant_application',
            'commune_id',
            'commune',
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
            'fk-grant_application-commune_id',
            'grant_application'
        );

        $this->dropIndex(
            'idx-grant_application-commune_id',
            'grant_application'
        );

        $this->dropColumn('{{%grant_application}}', 'commune_id');
    }
}
