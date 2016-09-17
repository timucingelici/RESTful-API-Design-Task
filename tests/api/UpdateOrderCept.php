<?php 
$I = new ApiTester($scenario);
$I->wantTo('update an order\'s status and see if it returns "{success: true}" as a response');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendPATCH('/order/1', ['status' => 'shipped']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id' => 'integer:>0|string:>0',
    'userId' => 'integer:>0|string:>0',
    'retailerId' => 'integer:>0|string:>0',
    'status' => 'integer:=5|string:=5', // shipped means 5 in the DB.
    'total' => 'integer|string'
]);
