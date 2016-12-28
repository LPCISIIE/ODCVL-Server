<?php

$app->group('/properties', function () {
    $this->map(['GET', 'POST'], '/add', 'PropertyController:add')->setName('property.add');
    $this->map(['GET', 'POST'], '/{id:[0-9]+}/edit', 'PropertyController:edit')->setName('property.edit');
    $this->get('/{id:[0-9]+}/delete', 'PropertyController:delete')->setName('property.delete');
    $this->get('', 'PropertyController:get')->setName('property.get');
});
