<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Add products to cart');

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

$I->click("Women");
$I->amOnPage('/women');
$I->click('Details');
$I->amOnPage('/products/1');

$size1 = '39';
$amount1 = 2;
$I->fillField('amount', $amount1);
$I->selectOption('select', $size1);
$I->click('ADD TO CART');

$I->seeInDatabase('cart_product', [
    'cart_id' => 1,
    'product_id' => 1,
    'total_product_price' => 240,
    'total_product_amount' => $amount1,
    'product_size' => $size1
]);
$I->seeInDatabase('carts', [
    'user_id' => null,
    'total_price' => 240,
    'total_amount' => $amount1,
]);
$I->amOnPage('/carts');
$I->dontsee('Cart is currently empty', 'h5');
$I->see("Clear cart", 'a');
$I->see("Brand: ", 'tr > th');
$I->see("Type: ", 'tr > th');
$I->see("Size: ", 'tr > th');
$I->see("Total price: ", 'tr > th');
$I->see("Total amount: ", 'tr > th');

$I->see("Lasocki", 'tr > td');
$I->see("Boots", 'tr > td');
$I->see("39", 'tr > td');
$I->see("240", 'tr > td');
$I->see("2", 'tr > td');

$I->see("Total price of items:", 'tr > td');
$I->see("240", 'tr > td');
$I->see("Total amount of items:", 'tr > td');
$I->see("2", 'tr > td');
$I->see("Discount Code: ", 'label');

$I->amOnPage('/products/1');
$size2 = '40';
$amount2 = 6;
$I->fillField('amount', $amount2);
$I->selectOption('select', $size2);

$I->click('ADD TO CART');
$I->seeCurrentUrlEquals('/products/1');
$I->see('We do not have as many pairs of shoes as you want to buy, please reduce the number of pairs');

$amount2 = 3;
$I->fillField('amount', $amount2);
$I->selectOption('select', $size2);
$I->click('ADD TO CART');

$I->seeInDatabase('cart_product', [
    'cart_id' => 1,
    'product_id' => 1,
    'total_product_price' => 360,
    'total_product_amount' => $amount2,
    'product_size' => $size2
]);
$I->seeInDatabase('carts', [
    'user_id' => null,
    'total_price' => 600,
    'total_amount' => $amount1 + $amount2,
]);
$I->amOnPage('/carts');

$I->see("Lasocki", 'tr > td');
$I->see("Boots", 'tr > td');
$I->see("40", 'tr > td');
$I->see("360", 'tr > td');
$I->see("3", 'tr > td');

$I->see("Total price of items:", 'tr > td');
$I->see("600", 'tr > td');
$I->see("Total amount of items:", 'tr > td');
$I->see("5", 'tr > td');
