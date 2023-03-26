<?php
$faker = \Faker\Factory::create();

$data = [];
foreach (range(1, 15) as $value) {
    $data[sprintf('program_%s', $value)] = [
        'name'        => $faker->unique()->catchPhrase(),
        'description' => $faker->realText(),
    ];
}

return $data;
