<?php 
$I = new FunctionalTester($scenario);

$I->am('guest');
$I->wantTo('Login');

$I->amOnPage('/login');
$I->fillField('email', 'tester@admin.com');
$I->fillField('password', 'anish12');
$I->click('SIGN IN');
$I->see('Recommended Peoples');
$I->seeLink('Logout','/logout'); // matches <a href="/logout">Logout</a>
$I->seeCurrentUrlEquals('/home');