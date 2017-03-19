<?php

require __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Yaml\Yaml;

$parameters = Yaml::parse(file_get_contents(__DIR__ . '/parameters.yml'))['parameters'];

$capsule = new Manager();
$capsule->addConnection($parameters['eloquent']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Remove all tables
require __DIR__ . '/database/drop.php';

// Create tables
require __DIR__ . '/database/auth.php';
require __DIR__ . '/database/stock.php';
require __DIR__ . '/database/locations.php';
require __DIR__ . '/database/flows.php';

// Save mock data
require __DIR__ . '/database/fixtures.php';
