<?php

require_once 'vendor/autoload.php';

define('BOOKS_NUMBER', 100);

$shelf = new \App\BookShelf();

$faker = Faker\Factory::create('ja_JP');
$faker->addProvider(new \App\BookFaker($faker));

for ($i=0; $i<BOOKS_NUMBER; $i++) {

    $book = new \App\Book();
    $book->setIsbn($faker->isbnStr);
    $book->setTitle($faker->title);
    $book->setAuthor($faker->name);

    $shelf->add($book);

}

$book = new \App\Book();
$book->setIsbn('ISBN000-0-0000-0000-0');
$book->setTitle($faker->title);
$book->setAuthor($faker->name);

$shelf->add($book);

$book1 = $shelf->search(['isbn' => 'ISBN000-0-0000-0000-0']);
var_dump($book1);

echo PHP_EOL . '=====' . PHP_EOL . PHP_EOL;

$book2 = $shelf->search(['title' => 'PHPによるオブジェクト指向']);
var_dump($book2);

echo PHP_EOL . '=====' . PHP_EOL . PHP_EOL;

$book3 = $shelf->search(['author' => '佐藤']);
var_dump($book3);

echo PHP_EOL . '=====' . PHP_EOL . PHP_EOL;

$book4 = $shelf->search(['title' => 'PHPプログラミング', 'author' => '佐藤']);
var_dump($book4);
