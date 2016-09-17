<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /users/USER_ID and see it returns a valid user object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/user/1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'firstName' => 'string',
    'lastName'  => 'string',
    'email'     => 'string:email'
]);


