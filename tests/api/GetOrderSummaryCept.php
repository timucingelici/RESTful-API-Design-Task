<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /orders/summary and see if it returns a summary object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/orders/summary');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'orders'    => 'integer:>0',
    'accepted'  => 'integer:>0',
    'rejected'  => 'integer:>0',
    'cancelled' => 'integer:>0',
    'pending'   => 'integer:>0',
    'shipped'   => 'integer:>0',
    'totalAmount' => 'integer:>0'
]);
