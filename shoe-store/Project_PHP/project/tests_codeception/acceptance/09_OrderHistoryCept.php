<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('I want to see order history');

$I->amOnPage('/orders');

$I->seeCurrentUrlEquals('/');


$I->amOnPage('/dashboard' );

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'jane.doe@gmail.com');
$I->fillField('password', 'secret2');

$I->click('Log in');

$I->amOnPage('/dashboard' );

$I->amOnPage('products/1');
$I->selectOption('size',39);
$I->fillField('amount',2);
$I->click('ADD TO CART');

$I->amOnPage('products/3');
$I->selectOption('size',39);
$I->fillField('amount',1);
$I->click('ADD TO CART');

$I->seeCurrentUrlEquals('/carts?cart=2');

$I->click('Order');

$I->seeCurrentUrlEquals('/orders');

$I->click('Complete your transaction!');

$I->seeCurrentUrlEquals('/dashboard');

$I->see('ORDER HISTORY');

$I->click('Details');

$I->seeCurrentUrlEquals('/order/1');

$I->see("YOUR PRODUCTS IN ORDER");

$I->see('Lasocki','tr > td');
$I->see('120','tr > td');
$I->see('Deezee','tr > td');
$I->see('80','tr > td');





