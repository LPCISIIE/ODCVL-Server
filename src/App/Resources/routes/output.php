<?php

$app->group('/outputs', function () {
    $this->get('', 'OutPutController:getCollection')->setName('get_outputs');

});