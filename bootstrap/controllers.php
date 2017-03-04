<?php

$container['AuthController'] = function ($container) {
    return new App\Controller\AuthController($container);
};

$container['CategoryController'] = function ($container) {
    return new App\Controller\CategoryController($container);
};

$container['ProductController'] = function ($container) {
    return new App\Controller\ProductController($container);
};

$container['ItemController'] = function ($container) {
    return new App\Controller\ItemController($container);
};
$container['ClientController'] = function ($container) {
    return new App\Controller\ClientController($container);
};