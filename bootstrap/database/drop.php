<?php

use Illuminate\Database\Capsule\Manager;

Manager::schema()->disableForeignKeyConstraints();

Manager::schema()->dropIfExists('activations');
Manager::schema()->dropIfExists('persistences');
Manager::schema()->dropIfExists('reminders');
Manager::schema()->dropIfExists('role_users');
Manager::schema()->dropIfExists('throttle');
Manager::schema()->dropIfExists('roles');
Manager::schema()->dropIfExists('access_token');
Manager::schema()->dropIfExists('refresh_token');
Manager::schema()->dropIfExists('user');

Manager::schema()->dropIfExists('category_product');
Manager::schema()->dropIfExists('item_location');
Manager::schema()->dropIfExists('item');
Manager::schema()->dropIfExists('product');
Manager::schema()->dropIfExists('category');
Manager::schema()->dropIfExists('location');
Manager::schema()->dropIfExists('client');
Manager::schema()->dropIfExists('flow');

