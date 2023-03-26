<?php

use app\models\Commune;
use app\models\CallForApplication;

$callForApplication = CallForApplication::find()->all();

$data = [];

$i = 0;
foreach ($callForApplication as $app) {
    $c = (int)($app->max_grant_application / 10);
    $communes = Commune::find()->limit($c)->all();

    foreach ($communes as $commune) {
        $data[sprintf('call_for_application_commune_%s', $i)] = [
            'call_for_application_id' => $app->id,
            'commune_id'              => $commune->id,
            'max_grant_application'   => 9,
        ];
        $i++;
    }

}

return $data;
