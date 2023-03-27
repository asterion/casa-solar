<?php

use yii\db\Migration;

/**
 * Class m230327_175025_recreate_create_call_grant_application_view_view
 */
class m230327_175025_recreate_create_call_grant_application_view_view extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->execute('DROP VIEW call_grant_application_view');
        $sql = 'CREATE VIEW call_grant_application_view AS SELECT cfa.*, IFNULL(cfa_ga.count_grant_application, 0) AS count_grant_application FROM call_for_application cfa LEFT JOIN (SELECT c.id, COUNT(g.email) AS count_grant_application FROM call_for_application c, grant_application g WHERE c.id = g.call_for_application_id GROUP BY c.id) cfa_ga ON cfa_ga.id = cfa.id';
        $this->execute($sql);
    }

    public function down()
    {
        return false;
    }
}
