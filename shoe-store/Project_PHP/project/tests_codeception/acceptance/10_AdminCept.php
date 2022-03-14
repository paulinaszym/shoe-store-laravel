<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Test admin pages for user');

$I->amOnPage('/admin');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'mary.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('Log in');

$I->seeCurrentUrlEquals('/');

$I->see('Dashboard');
