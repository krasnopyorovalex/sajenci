<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Page::class, static function (Faker $faker) {
    return [
        'name' => 'Саженцы в Крыму',
        'title' => 'Саженцы в Крыму',
        'description' => 'Саженцы в Крыму',
        'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam culpa ducimus est eum explicabo laborum, maxime minima mollitia. Aut, dolorum ea eos explicabo illum iusto necessitatibus quas reiciendis rerum voluptatem.',
        'alias' => 'index',
        'template' => 'page.index'
    ];
});
