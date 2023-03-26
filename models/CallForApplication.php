<?php

namespace app\models;

use yii\db\ActiveRecord;

class CallForApplication extends ActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{call_for_application}}';
    }

    public static function isActive($id)
    {
        $active = (new \yii\db\Query())
            ->select([
                '(active AND max_grant_application > count_grant_application) AS active',
            ])
            ->from('call_grant_application_view')
            ->where(['id' => $id])
            ->scalar();

        return (bool)$active;
    }

    public static function getCallForApplicationActive()
    {
        $rows = (new \yii\db\Query())
            ->select([
                'call_grant_application_view.id',
                'call_grant_application_view.program_id',
                'call_grant_application_view.max_grant_application',
                'call_grant_application_view.count_grant_application',
                '(call_grant_application_view.active AND call_grant_application_view.max_grant_application > call_grant_application_view.count_grant_application) AS active',
                'program.name',
                'program.description',
            ])
            ->from('call_grant_application_view')
            ->join('LEFT JOIN', 'program', 'program.id = call_grant_application_view.program_id')
            ->where(['call_grant_application_view.active' => 1])
            ->andWhere('call_grant_application_view.max_grant_application > call_grant_application_view.count_grant_application')
            ->orderBy('program.name')
            ->all();

        return $rows;
    }

    public static function getCallForApplication()
    {
        $rows = (new \yii\db\Query())
            ->select([
                'call_grant_application_view.id',
                'call_grant_application_view.program_id',
                'call_grant_application_view.max_grant_application',
                'call_grant_application_view.count_grant_application',
                '(call_grant_application_view.active AND call_grant_application_view.max_grant_application > call_grant_application_view.count_grant_application) AS active',
                'program.name',
                'program.description',
            ])
            ->from('call_grant_application_view')
            ->join('LEFT JOIN', 'program', 'program.id = call_grant_application_view.program_id')
            ->orderBy('program.name')
            ->all();

        return $rows;
    }
}
