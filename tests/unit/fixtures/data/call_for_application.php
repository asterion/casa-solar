<?php

use app\models\Program;
use app\models\CallForApplicationStage;

$programs = Program::find()->all();
$stage = CallForApplicationStage::find()
    ->where(['name' => 'Postulación abierta'])
    ->one();

$data = [];

foreach ($programs as $i => $program) {
    $data[sprintf('call_for_application_%s', $i)] = [
        'program_id'            => $program->id,
        'stage_id'              => $stage->id,
        'active'                => (bool)rand(0, 1),
        'max_grant_application' => 10 * rand(1, 10),
    ];
}

return $data;
