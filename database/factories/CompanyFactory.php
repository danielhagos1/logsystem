<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Company;
use App\Department;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
           'user_id'=>function(){
                return factory(App\User::class)->create()->id;
            },
           
            'cname' => $faker->sentence,
            'created_at' => now()
        
        
    ];
});