<?php

use Carbon\Carbon;

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('See statistics as admin');


$order_id = $I->haveInDatabase('orders',[
    'user_id' => 2,
    'created_at' => Carbon::now()
]);


$I->seeNumRecords(1,'orders');

$order_product_id = $I->haveInDatabase('order_products',[
    'order_id' => $order_id,
    'product_id' => '1',
    'tot_price' => '240',
    'tot_amount' => '2'
]);
$I->seeNumRecords(1,'order_products');

$I->amOnPage('/admin');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('Log in');

$I->seeCurrentUrlEquals('/admin/dashboard');

$I->see('Number of users: 2' );
$I->see('Number of users registered today: 0');
$I->see('Number of orders made today: 1');
$I->see('Number of products sold today: 2');
$I->see("Revenue from today's orders: 240 $");
