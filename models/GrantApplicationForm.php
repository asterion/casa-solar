<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * GrantApplicationForm
 */
class GrantApplicationForm extends Model
{
    public $email;
    public $program_id;
    public $commune_id;
    public $call_for_application_id;
    public $verifyCode;

    public function rules()
    {
        return [
            [['email', 'commune_id'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Por favor ingrese el código de la imagen.',
        ];
    }
}
