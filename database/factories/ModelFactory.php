<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'cell_phone' => $faker->e164PhoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shipment::class, function (Faker\Generator $faker) {

    return [

    	    'created_by' => $faker->name(),
            'customer' => $faker->name(),
            'urgency' => $faker->word(),
            'load_type' => $faker->word(),
            'trailer_type' => $faker->word(),
            'pick_city' => $faker->city(),
            'pick_state' => $faker->state(),
            'pick_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'pick_time' => $faker->time(),
            'actual_pick_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'actual_pick_time' => $faker->time(),
            'delivery_city' => $faker->city(),
            'delivery_state' => $faker->state(),
            'delivery_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'delivery_time' => $faker->time(),
            'actual_delivery_date' => $faker->date($format = 'm/d/Y', $max = 'now'),
            'actual_delivery_time' => $faker->time(),
            'commodity' => $faker->sentence(),
            'special_instructions' => $faker->sentence(),
            'length' => $faker->numberBetween($min = 5, $max = 40),
            'width' => $faker->numberBetween($min = 4, $max = 9),
            'height' => $faker->numberBetween($min = 4, $max = 11),
            'weight' => $faker->numberBetween($min = 1000, $max = 40000),
            'miles' => $faker->numberBetween($min = 200, $max = 2000),
            'billing_money' => $faker->numberBetween($min = 200, $max = 2000),
            'offer_money' => $faker->numberBetween($min = 200, $max = 2000),
            'post_money' => $faker->numberBetween($min = 200, $max = 2000),
            'company_contact' => $faker->word(),
            'contact_phone' => $faker->word(),
            'user_id' => $faker->numberBetween($min = 1, $max = 10),
        
    ];
});

$factory->define(App\Store::class, function (Faker\Generator $faker) {

    return [

    		'pc_number' => $faker->buildingNumber(),
    	    'analysis_region_name' => $faker->name(),
            'address' => $faker->streetAddress(),
            'city' => $faker->city(),
            'state' => $faker->stateAbbr(),
            'zip' => $faker->postcode(),
            'phone' => $faker->phoneNumber(),
        
    ];
});
