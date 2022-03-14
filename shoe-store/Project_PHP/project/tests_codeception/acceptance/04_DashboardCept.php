<?php
$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('see user information and address');

$I->amOnPage('/dashboard');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'jane.doe@gmail.com');
$I->fillField('password', 'secret2');

$I->click('Log in');

$I->seeCurrentUrlEquals('/dashboard');

$userUsername = "Jane_Doe";
$userFirstname='Jane';
$userSurname = 'Doe';
$userPhone = '321654987';
$userEmail = 'jane.doe@gmail.com';

$I->see("ACCOUNT INFO");
$I->see("$userUsername", 'tr > td');
$I->see("$userFirstname", 'tr > td');
$I->see("$userSurname", 'tr > td');
$I->see("$userPhone", 'tr > td');
$I->see("$userEmail", 'tr > td');

$addressStreetaddress1 = 'Forest 5';
$addressStreetaddress2 = '';
$addressZipcode = '543-11';
$addressCity = 'Cracow';

$I->see("ADDRESS INFO");
$I->see("$addressStreetaddress1", 'tr > td');
$I->see("$addressStreetaddress2", 'tr > td');
$I->see("$addressZipcode", 'tr > td');
$I->see("$addressCity", 'tr > td');

$I->see("ORDER HISTORY");


