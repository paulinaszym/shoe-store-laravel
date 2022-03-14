<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Choose different categories and search products');

$I->amOnPage('/women');

$I->seeInTitle('SHOES STORE');
$I->see("Women");
$I->see("Men");
$I->see("Log in");
$I->see("Register");
$I->see("Filter");

$I->click("SEARCH");

$I->see("The brand field is required",'li');
$I->see("The type field is required",'li');
$I->see("The size field is required",'li');


$I->fillField("brand","lasocki");

$I->see("The type field is required",'li');
$I->see("The size field is required",'li');


$I->dontSeeInField("brand","lasocki");

$brand="lasocki";
$type="boots";
$price="120";

$I->fillField("brand",$brand);
$I->fillField("type",$type);
$I->selectOption("size",39);

$I->click("SEARCH");

$I->seeCurrentUrlEquals("/women/search");

$I->seeInDatabase("products",[
    'brand'=>$brand,
    'type'=>$type,
    'price'=>$price
]);

$I->see($price);

$I->see("RESET FILTER");

$I->click("RESET FILTER");

$I->seeCurrentUrlEquals('/women');

$brand="deezee";
$type="sneakers";
$price="40";

$I->fillField("brand",$brand);
$I->fillField("type",$type);
$I->selectOption("size",39);

$I->click("SEARCH");

$I->dontSeeInDatabase("products",[
    'brand'=>$brand,
    'type'=>$type,
    'price'=>$price
]);

$I->dontSee($price);

$I->see("0 products are available");

$I->click("RESET FILTER");

$I->seeCurrentUrlEquals("/women");

///here men
///
$I->amOnPage('/men');

$I->seeInTitle('SHOES STORE');
$I->see("Women");
$I->see("Men");
$I->see("Log in");
$I->see("Register");
$I->see("Filter");

$I->click("SEARCH");

$I->see("The brand field is required",'li');
$I->see("The type field is required",'li');
$I->see("The size field is required",'li');


$I->fillField("type","sneakers");

$I->see("The brand field is required",'li');
$I->see("The size field is required",'li');


$I->dontSeeInField("type","sneakers");

$brand="nike";
$type="sneakers";
$price="96";

$I->fillField("brand",$brand);
$I->fillField("type",$type);
$I->selectOption("size",39);

$I->click("SEARCH");

$I->seeCurrentUrlEquals("/men/search");

$I->seeInDatabase("products",[
    'brand'=>$brand,
    'type'=>$type,
    'price'=>$price
]);

$I->see($price);

$I->see("RESET FILTER");

$I->click("RESET FILTER");

$I->seeCurrentUrlEquals('/men');

$brand="nike";
$type="elegant";
$price="130";

$I->fillField("brand",$brand);
$I->fillField("type",$type);
$I->selectOption("size",40);

$I->click("SEARCH");

$I->dontSeeInDatabase("products",[
    'brand'=>$brand,
   'type'=>$type,
   'price'=>$price
]);

$I->dontSee($price);

$I->see("0 products are available");

$I->click("RESET FILTER");

$I->seeCurrentUrlEquals("/men");


$brand="nike";
$type="sneakers";
$price="96";

$I->fillField("brand",$brand);
$I->fillField("type",$type);
$I->selectOption("size",39);

$I->click("SEARCH");

$I->seeInDatabase("products",[
    'brand'=>$brand,
   'type'=>$type,
   'price'=>$price
]);

$I->see($price);

$I->click('Details');

$I->seeCurrentUrlEquals('/products/5');

$I->selectOption('size',39);

$I->click("Return to products list");

$I->seeCurrentUrlEquals("/men");

