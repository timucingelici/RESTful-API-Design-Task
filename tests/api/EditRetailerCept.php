<?php

use Faker\Factory as Faker;

$faker = Faker::create();

$name = $faker->company;
$email = $faker->companyEmail;
$location = $faker->address;

$I = new ApiTester($scenario);
$I->wantTo('send a PATCH request to /retailer/RETAILER_ID to edit and see if it returns the correct retailer object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendPATCH('/retailer/1',['name' => $name, 'location' => $location, 'email' => $email]);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'      => 'string:=' . $name,
    'location'  => 'string:=' . $location,
    'email'     => 'string:=' . $email
]);

