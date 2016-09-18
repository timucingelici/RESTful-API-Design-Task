<?php
$I = new ApiTester($scenario);
$I->wantTo('call /role/1 and see if it returns a valid role object');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/role/1');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'    => 'string:=admin|string:=user'
]);