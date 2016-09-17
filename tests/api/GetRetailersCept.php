<?php 
$I = new ApiTester($scenario);
$I->wantTo('Call /retailers and see if it returns the retailers array');
$I->haveHttpHeader('Accept', 'application/json');
$I->sendGET('/retailers');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->seeResponseIsJson();
$I->seeResponseMatchesJsonType([
    'id'        => 'integer:>0',
    'name'      => 'string',
    'location'  => 'string',
    'email'     => 'string:email'
], '$.*');

