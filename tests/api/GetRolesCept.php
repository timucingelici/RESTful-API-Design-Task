<?php 
$I = new ApiTester($scenario);
$I->wantTo('call /roles and see if it returns the roles array');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/roles');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'    => 'string:=admin|string:=user'
], '$.*');