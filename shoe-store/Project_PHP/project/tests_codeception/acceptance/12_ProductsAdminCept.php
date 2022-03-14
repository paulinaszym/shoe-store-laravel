<?php

$I = new AcceptanceTester($scenario ?? null);
$I->wantTo('Manage products as admin');

$I->amOnPage('/admin');
$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('Log in');

$I->seeCurrentUrlEquals('/admin/dashboard');

$I->click('Products managment');

$I->seeCurrentUrlEquals('/admin/products');

$I->see('Products managment', 'h2');

$I->see('Women products', 'h3');
$I->see('Men products', 'h3');

$I->dontSee('No women products in database.');
$I->dontSee('No men products in database.');

$I->click('Create new');

$I->seeCurrentUrlEquals('/admin/products/create');

$brand = "Kazar";
$type = "Ballerinas";
$price = "50";
$description = 'Perfect shoes for long parties';
$category ='Women';
$image='ballerinas.jpg';

$I->fillField('brand', $brand);
$I->fillField('price', $price);
$I->fillField('description', $description);
$I->selectOption('category', $category);

$I->click('Create');

$I->seeCurrentUrlEquals('/admin/products/create');
$I->see('The type field is required.');

$I->DontSeeInDatabase('products', [
    'brand' => $brand,
    'price' => $price,
    'description' => $description
]);

$I->fillField('type', $type);

$I->click('Create');

$I->SeeInDatabase('products', [
    'brand' => $brand,
    'price' => $price,
    'description' => $description,
]);

$product_id = $I->grabFromDatabase('products','id',[
    'brand' => $brand,
    'price' => $price,
    'description' => $description
]);

$I->seeCurrentUrlEquals('/admin/products/'. $product_id);

$I->see('Product', 'h2');

$I->see($product_id);
$I->see($brand);
$I->see($type);
$I->see($price);
$I->see($description);

$I->click('Edit');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/edit');

$I->seeInField('brand', $brand);
$I->seeInField('type', $type);
$I->seeInField('price', $price);
$I->seeInField('description', $description);
$I->see($category);

$newDescription = 'Beautiful red ballerinas';
$I->fillField('description', $newDescription);

$I->click('Update');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id);

$I->see($newDescription);

$I->dontSeeInDatabase('products', [
    'brand' => $brand,
    'price' => $price,
    'description' => $description,
]);

$I->SeeInDatabase('products', [
    'brand' => $brand,
    'price' => $price,
    'description' => $newDescription,
]);



$I->click('Shelves');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves');

$I->see('Shelves');
$I->see('Product is not available');

$I->click('Add');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves/create');

$I->see('Creating a new shelf','h2');
$size = "10";
$amount = "50";

$I->fillField('size', $size);
$I->fillField('amount', $amount);

$I->click('Create');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves/create');

$I->see('The size must be between 37 and 43.');

$newSize= "38";
$I->fillField('size', $newSize);

$I->dontSeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $size,
    'amount' => $amount
]);

$I->click('Create');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves');

$I->SeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $amount
]);

$shelf_id = $I->grabFromDatabase('shelves','id',[
    'product_id' => $product_id,
    'size' => $newSize,
]);

$I->see($shelf_id);
$I->see($newSize);
$I->seeinField('amount',$amount);


$I->click('Add');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves/create');

$amount2 = "10";

$I->fillField('size', $newSize);
$I->fillField('amount', $amount2);

$I->click('Create');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves');

$I->dontSeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $amount
]);

$newAmount= "60";
$I->SeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $newAmount
]);

$I->see($shelf_id);
$I->see($newSize);
$I->seeinField('amount',$newAmount);

$newAmount2 = "54";
$I->fillField('amount',$newAmount2);

$I->click('Save');

$I->dontSeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $newAmount
]);

$I->SeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $newAmount2
]);

$I->see($shelf_id);
$I->see($newSize);
$I->seeinField('amount',$newAmount2);

$I->click('Add');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves/create');

$size_2 = "43";
$amount_2 = "114";

$I->fillField('size', $size_2);
$I->fillField('amount', $amount_2);

$I->click('Create');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves');

$I->SeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $size_2,
    'amount' => $amount_2
]);

$shelf_id_2 = $I->grabFromDatabase('shelves','id',[
    'product_id' => $product_id,
    'size' => $size_2,
]);

$I->see($shelf_id_2);
$I->see($size_2);

$I->click('Delete');

$I->seeCurrentUrlEquals('/admin/products/' . $product_id . '/shelves');

$I->dontSeeInDatabase('shelves', [
    'product_id' => $product_id,
    'size' => $newSize,
    'amount' => $newAmount2
]);

$I->amOnPage('/admin/products/' . $product_id);

$I->click('Delete');

$I->seeCurrentUrlEquals('/admin/products');

$I->dontSeeInDatabase('products', [
    'brand' => $brand,
    'price' => $price,
    'description' => $description,
]);

$I->dontSeeInDatabase('shelves', [
    'product_id' => $product_id
]);

