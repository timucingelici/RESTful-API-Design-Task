<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /order/ORDER_ID/user and see it returns a valid user object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/order/1/user');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'firstName' => 'string',
    'lastName'  => 'string',
    'email'     => 'string:email'
]);