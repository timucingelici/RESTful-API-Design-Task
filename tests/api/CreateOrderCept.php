<?php 
$I = new ApiTester($scenario);
$I->wantTo('Create an order with a valid user ID, retailer ID, amount and a status');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendPOST('/order', ['userId' => 764, 'retailerId' => 82, 'status' => 'pending', 'total' => 500]);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'userId' => 'integer:=764|string:=764',
    'retailerId' => 'integer:=82|string:82',
    'status' => 'integer:=4|string:=4', // pending's ID is 4 in the DB.
    'total' => 'integer:=500|string:=500'
]);
