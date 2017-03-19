<?php

$app->group('/inputs', function () {
    $this->get('', 'InPutController:getCollection')->setName('get_inputs');

});