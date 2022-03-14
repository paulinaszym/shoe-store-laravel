<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Clear cart');

$I->amOnPage('/products/1');
$I->fillField('amount', 2);
$I->selectOption('select', '39');
$I->click('ADD TO CART');

$I->amOnPage('/carts');

$I->click("Clear cart");

$I->dontseeInDatabase('cart_product', [
    'cart_id' => 1,
    'product_id' => 1,
    'total_product_price' => 240,
    'total_product_amount' => 2,
    'product_size' => '39'
]);

$I->seeInDatabase('carts', [
    'user_id' => null,
    'total_price' => 0,
    'total_amount' => 0,
]);
$I->amOnPage('/carts');

$I->see('Cart is currently empty', 'h5');
$I->dontsee("Clear cart", 'a');
$I->dontsee("Brand: ", 'tr > th');
$I->dontsee("Type: ", 'tr > th');
$I->dontsee("Size: ", 'tr > th');
$I->dontsee("Total price: ", 'tr > th');
$I->dontsee("Total amount: ", 'tr > th');
$I->see("Total price of items:", 'tr > td');
$I->see("0", 'tr > td');
$I->see("Total amount of items:", 'tr > td');
$I->see("0", 'tr > td');
$I->dontsee("Discount Code: ", 'label');
