<?php

use Faker\Generator as Faker;


$factory->define(App\Contato::class, function (Faker $faker) {

    return [
        'nome' => $faker->name,
        'telefone' => $faker->cellphoneNumber,
        'email' => $faker->unique()->safeEmail,

    ];
});
