<?php

return call_user_func(function () {
    $userCollection = new \Phalcon\Mvc\Micro\Collection();

    $userCollection
        ->setPrefix('/users')
        ->setHandler('App\Controller\UserController');

    $userCollection->get('/', 'index');

    return $userCollection;
});
