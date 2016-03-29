<?php

$factory->define(\TsuperNgBuhayTNVS\Models\IncomeTransaction::class, function (Faker\Generator $faker) {
    return [
        'fare' => $faker->randomDigitNotNull,
        'transaction_date_time' => $faker->dateTime,
        'discount' => $faker->randomDigitNotNull,
        'created_by' => $faker->numberBetween(0, 10),
        'type' => $faker->randomElement(['grab', 'rent']),
        'remarks' => $faker->sentence()
    ];
});
