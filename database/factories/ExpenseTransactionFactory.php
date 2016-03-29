<?php

$factory->define(\TsuperNgBuhayTNVS\Models\ExpenseTransaction::class, function (Faker\Generator $faker) {
    return [
        'amount' => $faker->randomDigitNotNull,
        'transaction_date_time' => $faker->dateTime,
        'created_by' => $faker->numberBetween(0, 10),
        'type' => $faker->randomElement(['grab', 'rent']),
        'remarks' => $faker->sentence()
    ];
});
