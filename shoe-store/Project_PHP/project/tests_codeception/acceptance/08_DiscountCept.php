<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Add discount code');

$I->amOnPage('/products/1');
$I->fillField('amount', 2);
$I->selectOption('select', '39');
$I->click('ADD TO CART');

$I->amOnPage('/carts');
$I->see("Discount Code: ", 'label');
$I->fillField('discount','SHOES');
$I->click('Submit');
$I->seeCurrentUrlEquals('/carts');
$I->see('This code is invalid');

$I->fillField('discount','WINTER');
$I->click('Submit');
$I->amOnPage('/carts?cart=1');
//$I->see('DISCOUNT CODE ACCEPTED :)');
$I->seeInDatabase('carts', [
    'user_id' => null,
    'total_price' => 192,
    'total_amount' => 2,
]);
