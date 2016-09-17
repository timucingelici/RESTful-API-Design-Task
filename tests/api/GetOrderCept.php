<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /order/ORDER_ID and see it returns a valid order object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/order/1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'userId'    => 'integer:>0|string:>0',
    'retailerId'=> 'integer:>0|string:>0',
    'status'    => 'integer:>0|string:>0',
    'total'     => 'integer:>0|string:>0'
]);