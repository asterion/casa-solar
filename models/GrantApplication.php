<?php

namespace app\models;

use yii\db\ActiveRecord;

class GrantApplication extends ActiveRecord
{
    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return '{{grant_application}}';
    }
}
