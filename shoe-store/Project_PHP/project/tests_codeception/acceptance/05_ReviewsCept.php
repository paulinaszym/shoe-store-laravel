<?php
$I = new AcceptanceTester($scenario ?? null);

$I->wantTo('Product reviews');

$I->amOnPage('/products/1');
$I->click('OPINIONS');

$I->amOnPage('/products/1/reviews');

$I->see('LIST OF REVIEWS', 'h4');

$I->see('No reviews in database.');

$I->click('Create new review...');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'jane.doe@gmail.com');
$I->fillField('password', 'secret2');

$I->click('Log in');

$I->seeCurrentUrlEquals('/products/1/reviews/create');

$I->see('Adding a review', 'h2');

$I->click('Add_review');

$I->see('The title field is required.', 'li');
$I->see('The text field is required.', 'li');

$reviewTitle = "Super produkt";
$reviewText = "Bardzo ładne i wygodne buty, pasują idealnie";

$I->fillField('title', $reviewTitle);
$I->fillField('text', $reviewText);

$I->click('Add_review');

$I->seeInDatabase('reviews', [
    'title' => $reviewTitle,
    'text' => $reviewText,
]);

$I->seeCurrentUrlEquals('/products/1/reviews');

$I->see('LIST OF REVIEWS', 'h4');
$I->see($reviewTitle);
$I->see($reviewText);

$I->click('Create new review...');
$I->seeCurrentUrlEquals('/products/1/reviews');
$I->see('Sorry,you cannot add a review,you have already posted a comment about this product');
