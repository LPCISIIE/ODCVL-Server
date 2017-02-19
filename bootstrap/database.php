<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Yaml\Yaml;

$parameters = Yaml::parse(file_get_contents(__DIR__ . '/parameters.yml'))['parameters'];

$capsule = new Manager();
$capsule->addConnection($parameters['eloquent']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

Manager::schema()->dropIfExists('activations');
Manager::schema()->dropIfExists('persistences');
Manager::schema()->dropIfExists('reminders');
Manager::schema()->dropIfExists('role_users');
Manager::schema()->dropIfExists('throttle');
Manager::schema()->dropIfExists('roles');
Manager::schema()->dropIfExists('access_token');
Manager::schema()->dropIfExists('user');

Manager::schema()->dropIfExists('category_product');

Manager::schema()->dropIfExists('item');
Manager::schema()->dropIfExists('category');
Manager::schema()->dropIfExists('product');

require __DIR__ . '/database/auth.php';
require __DIR__ . '/database/stock.php';

require __DIR__ . '/database/fixtures.php';
