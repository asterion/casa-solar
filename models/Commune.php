<?php

namespace app\models;

use yii\db\ActiveRecord;

class Commune extends ActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{commune}}';
    }

    public static function getDropdownListCallForApplication($call_for_application_id)
    {
        // select c.id, c.name, IFNULL(cfac.max_grant_application, 0) AS max_grant_application from commune c left join call_for_application_commune cfac on cfac.commune_id = c.id and cfac.call_for_application_id = 1;

        $communes = (new \yii\db\Query())
            ->select([
                'c.id',
                'c.name',
                'IFNULL(cfac.max_grant_application, 0) AS max_grant_application'
            ])
            ->from('commune c')
            ->join('LEFT JOIN', 'call_for_application_commune cfac', 'cfac.commune_id = c.id AND cfac.call_for_application_id = ' . (int)$call_for_application_id)
            ->all();

        // SELECT call_for_application_id, commune_id, COUNT(*) AS count_grant_application_commune  FROM grant_application WHERE call_for_application_id = 1 GROUP BY call_for_application_id, commune_id;

        $grant_applications = (new \yii\db\Query())
            ->select([
                'commune_id',
                'COUNT(*) AS count_grant_application_commune'
            ])
            ->from('grant_application')
            ->where(['call_for_application_id' => (int)$call_for_application_id])
            ->groupBy(['call_for_application_id', 'commune_id'])
            ->all();

        $commune_counts = [];

        foreach ($grant_applications as $data) {
            $commune_counts[$data['commune_id']] = $data['count_grant_application_commune'];
        }

        $list = [];

        foreach ($communes as $commune) {
            if ( !isset($commune_counts[$commune['id']]) || $commune['max_grant_application'] > $commune_counts[$commune['id']] ) {
                $list[$commune['id']] = $commune['name'];
            }
        }

        return $list;
    }

    public static function getDropdownList()
    {
        $communes = Commune::find()
                ->select(['id', 'name'])
                ->orderBy('name')
                ->all();

        $list = [];

        foreach ($communes as $commune) {
            $list[$commune->id] = $commune->name;
        }

        return $list;
    }

    public function __toString()
    {
        return $this->name;
    }

}
