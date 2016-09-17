<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /retailers/RETAILER_ID and see it returns a valid retailer object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/retailer/1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'      => 'string',
    'location'  => 'string',
    'email'     => 'string:email'
]);