<?php

$app->map(['GET', 'POST'], '/properties/add', 'PropertyController:add')->setName('property.add');
$app->map(['GET', 'POST'], '/properties/{id:[0-9]+}/edit', 'PropertyController:edit')->setName('property.edit');
$app->get('/properties/{id:[0-9]+}/delete', 'PropertyController:delete')->setName('property.delete');
$app->get('/properties', 'PropertyController:get')->setName('property.get');
