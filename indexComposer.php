<?php

require './vendor/autoload.php';

/*$op = new \CoffeeCode\Optimizer\Optimizer();

echo $op->optimize(
    "Optimizer Happy and @CoffeeCode",
    "Is a compact and easy-to-use tag creator to optimize your site",
    "https://www.upinside.com.br/coffeecode/optimizer/example/",
    "https://www.upinside.com.br/uploads/images/2017/11/curso-de-html5-preparando-ambiente-de-trabalho-aula-02-1511276983.jpg"
)->render();

var_dump($op);
*/
use Melbahja\Seo\Factory;

$metatags = Factory::metaTags(
    [
    'title' => 'My new article',
    'description' => 'My new article about how php is awesome',
    'keywords' => 'php, programming',
    'robots' => 'index, follow',
    'author' => 'Mohamed Elbahja'
    ]
);

echo $metatags;
