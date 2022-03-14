<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('see information about product, choose size and amount and add to cart');


$I->amOnPage('/products/3');
$I->see('DEEZEE', 'h2');
$I->see('$80', 'h5');
$I->see('PRODUCT INFO', 'h4');
$I->see('Yellow heels for every women.', 'h6');
$I->See('Quantity','label');
$I->See('Select your size:','label');

$I->click('SEE OPINIONS');

$I->seeCurrentUrlEquals('/products/3/reviews');

$I->click('Back to the product...');

$I->seeCurrentUrlEquals('/products/3');

$I->click('Return to products list');

$I->seeCurrentUrlEquals('/women');

$I->amOnPage('/products/3');
$I->selectOption('size',39);
$I->fillField('amount',3);
$I->click('ADD TO CART');
$I->see('We do not have as many pairs of shoes as you want to buy, please reduce the number of pairs');
$I->fillField('amount',1);
$I->selectOption('size',39);
$I->click('ADD TO CART');
$I->seeCurrentUrlEquals('/carts?cart=1');
$I->click('Clear cart');





