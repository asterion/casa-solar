<?php

use yii\db\Migration;

/**
 * Class m230326_133558_add_stage_id_column_to_call_for_application
 */
class m230326_133558_add_stage_id_column_to_call_for_application extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('call_for_application', 'stage_id', $this->integer());

        $this->createIndex(
            'idx-call_for_application-stage_id',
            'call_for_application',
            'stage_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-call_for_application-stage_id',
            'call_for_application',
            'stage_id',
            'call_for_application_stage',
            'id'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-call_for_application-stage_id',
            'call_for_application'
        );

        $this->dropIndex(
            'idx-call_for_application-stage_id',
            'call_for_application'
        );

        $this->dropColumn('call_for_application', 'stage_id');
        return false;
    }
}
