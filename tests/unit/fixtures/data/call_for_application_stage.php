<?php
$stages = [
    'Postulación abierta',
    'Postulación cerrada',
    'Inicio de revisión',
    'Notificación a postulantes',
    'Postulación finalizada',
];

$data = [];

foreach ($stages as $i => $name) {
    $data[sprintf('call_for_application_stage_%s', $i)] = [
        'name'     => $name,
        'position' => $i + 1
    ];
}

return $data;
