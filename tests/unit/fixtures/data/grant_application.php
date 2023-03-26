<?php

use app\models\Commune;
use app\models\CallForApplication;

$callForApplication = CallForApplication::find()->all();
$faker = \Faker\Factory::create();

$communes = array_keys(Commune::getDropdownList());

$data = [];

$i = 0;
foreach ($callForApplication as $app) {
    for ($j=0; $j < 5; $j++) {
        $data[sprintf('grant_application_%s', $i)] = [
            'program_id'              => $app->program_id,
            'commune_id'              => $communes[rand(0, count($communes)-1)],
            'email'                   => $faker->unique()->email(),
            'call_for_application_id' => $app->id,
        ];
        $i++;
    }
}

return $data;
