<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('See homepage and shoes by category');

$I->amOnPage('/');

$I->seeInTitle('SHOES STORE');
$I->see("Women");
$I->see("Men");
$I->see("Log in");
$I->see("Register");

$I->click("Women");

$I->amOnPage('/women');

$I->click("Men");

$I->amOnPage("/men");

$I->click("Shop");

$I->amOnPage('/');

$I->click("carts");

$I->amOnPage('/carts');

$I->click("Shop");

$I->amOnPage('/');

$I->click("Log in");

$I->amOnPage("/login");

$I->moveBack(1);

$I->amOnPage('/');

$I->click("Register");

$I->amOnPage("/register");



