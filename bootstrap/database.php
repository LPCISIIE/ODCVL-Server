<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

$config = require __DIR__ . '/db.php';

$capsule = new Manager();
$capsule->addConnection($config);
$capsule->setAsGlobal();
$capsule->bootEloquent();

Manager::schema()->dropIfExists('activations');
Manager::schema()->dropIfExists('persistences');
Manager::schema()->dropIfExists('reminders');
Manager::schema()->dropIfExists('role_users');
Manager::schema()->dropIfExists('throttle');
Manager::schema()->dropIfExists('roles');
Manager::schema()->dropIfExists('user');

Manager::schema()->dropIfExists('category_product');
Manager::schema()->dropIfExists('product_property');
Manager::schema()->dropIfExists('item_property');
Manager::schema()->dropIfExists('category_property');

Manager::schema()->dropIfExists('item');
Manager::schema()->dropIfExists('category');
Manager::schema()->dropIfExists('product');
Manager::schema()->dropIfExists('property');

require __DIR__ . '/database/auth.php';
require __DIR__ . '/database/stock.php';

require __DIR__ . '/database/fixtures.php';
