<?php
use Faker\Factory as Faker;

$faker = Faker::create();

$firstName = $faker->firstName;
$lastName = $faker->lastName;
$email = $faker->email;
$password = $faker->password();

$I = new ApiTester($scenario);
$I->wantTo('Create a user');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendPOST('/users', ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'password' => $password, 'role' => 'user']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'firstName' => 'string:='. $firstName,
    'lastName'  => 'string:='. $lastName,
    'email'     => 'string:=' . $email,
    'roleId'    => 'integer:=2|string:=2'
]);
