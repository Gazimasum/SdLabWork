<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
        'email' => $faker->email,
        'password'=>md5('123456'),
        'role'=>$faker->randomElement($array = array ('admin','teacher','student')),
        'dob' => $faker->date($format = 'Y-m-d', $max = '1997-12-12')
    ];
});
