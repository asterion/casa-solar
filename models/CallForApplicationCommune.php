<?php

namespace app\models;

use yii\db\ActiveRecord;

class CallForApplicationCommune extends ActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{call_for_application_commune}}';
    }
}
