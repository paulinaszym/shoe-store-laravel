<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('See cart for guest');

$I->amOnPage('/');

$I->dontsee('Dashboard', 'a');
$I->see("Log in", 'a');

$I->amOnPage('/products/1');
$I->fillField('amount', 2);
$I->selectOption('select', '39');
$I->click('ADD TO CART');

$I->amOnPage('/carts');

$I->see("Street Address", 'label');
$I->see("Street Address-more info", 'label');
$I->see("Zip code", 'label');
$I->see("City", 'label');
$I->see("Phone", 'label');
$I->see("Email", 'label');

$I->fillField('street_address_1', 'Street 2');
$I->fillField('street_address_2', 'local 3');
$I->fillField('zip_code', '11-111');
$I->fillField('city', 'Warsaw');
$I->fillField('phone', '999777333');
$I->fillField('email', 'mail@mail.com');
$I->click('Order');

$I->click('Log in');
