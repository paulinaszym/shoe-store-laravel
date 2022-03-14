<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Manage users as admin');

$I->amOnPage('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('Log in');

$I->seeCurrentUrlEquals('/admin/dashboard');

$I->click('Users managment');

$I->seeCurrentUrlEquals('/admin/users');

$I->see('Users managment', 'h2');

$I->see('Users', 'h3');
$I->see('Admins', 'h3');

$I->click('Details');

$userId = 2;
$username = 'Mary_Doe';
$firstname = 'Mary';
$surname = 'Doe';
$phone ='777654321';
$email ='mary.doe@gmail.com';
$role = 'User';

$I->seeCurrentUrlEquals('/admin/users/' . $userId);

$I->see('User Mary_Doe', 'h2');

$I->see($firstname);
$I->see($surname);
$I->see($phone);
$I->see($email);

$I->click('Edit');

$I->seeCurrentUrlEquals('/admin/users/' . $userId . '/edit');

$I->seeInField('username', $username);
$I->seeInField('firstname', $firstname);
$I->seeInField('surname', $surname);
$I->seeInField('phone', $phone);
$I->seeInField('email', $email);
$I->seeInField('password', "");
$I->seeInField('role', $role);

$I->fillField('phone', "234");

$I->click('Update');

$I->seeCurrentUrlEquals('/admin/users/' . $userId . '/edit');
$I->see('The phone must be 9 digits.', 'li');

$newPhone = '678123123';

$I->fillField('phone', $newPhone);
$I->click('Update');

$I->seeCurrentUrlEquals('/admin/users/' . $userId);

$I->see($newPhone);

$I->dontSeeInDatabase('users', [
    'username' => $username,
    'phone' => $phone
]);

$I->SeeInDatabase('users', [
    'username' => $username,
    'phone' => $newPhone
]);

$I->click('Delete');

$I->seeCurrentUrlEquals('/admin/users');

$I->DontSeeInDatabase('users', [
    'username' => $username,
    'phone' => $newPhone
]);
