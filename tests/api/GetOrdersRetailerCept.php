<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /order/ORDER_ID/retailer and see it returns a valid retailer object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/order/1/retailer');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'      => 'string',
    'location'  => 'string',
    'email'     => 'string:email'
]);