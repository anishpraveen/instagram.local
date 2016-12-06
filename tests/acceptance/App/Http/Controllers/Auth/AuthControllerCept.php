<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/login');
$I->seeElement('input', ['name' => 'email']);
$I->seeElement('input', ['type' => 'password']);
$I->seeElement('button', ['type' => 'submit']);
$I->seeInSource("<input type=\"hidden\" name=\"_token\" value=");