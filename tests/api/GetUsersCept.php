<?php 
$I = new ApiTester($scenario);
$I->wantTo('Call /users and see if it returns the users array');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/users');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'firstName' => 'string',
    'lastName'  => 'string',
    'email'     => 'string:email'
], '$.*');

