<?php

return call_user_func(function () {
    $authCollection = new \Phalcon\Mvc\Micro\Collection();

    $authCollection
        ->setPrefix('/auths')
        ->setHandler('App\Controller\AuthController', true);

    $authCollection->get('/', 'index');

    return $authCollection;
});
