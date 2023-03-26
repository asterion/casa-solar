<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%grant_application}}`.
 */
class m230325_115335_add_call_for_application_id_column_to_grant_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%grant_application}}', 'call_for_application_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%grant_application}}', 'call_for_application_id');
    }
}
