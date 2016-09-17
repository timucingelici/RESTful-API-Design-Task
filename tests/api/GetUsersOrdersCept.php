<?php 
$I = new ApiTester($scenario);
$I->wantTo('Call /user/USER_ID/orders and see if it returns the orders array');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/user/1/orders');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'userId'    => 'integer:>0|string:>0',
    'retailerId'=> 'integer:>0|string:>0',
    'status'    => 'integer:>0|string:>0',
    'total'     => 'integer:>0|string:>0'
], '$.*');