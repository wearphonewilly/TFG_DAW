<?php

use Melbahja\Seo\Factory;

$metatags = Factory::metaTags([
'title' => 'My new article',
'description' => 'My new article about how php is awesome',
'keywords' => 'php, programming',
'robots' => 'index, nofollow',
'author' => 'Mohamed Elbahja'
]);

echo $metatags;
