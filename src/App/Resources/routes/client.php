<?php

$app->group('/clients', function () {
    $this->get('', 'ClientController:getCollection')->setName('get_clients');

});