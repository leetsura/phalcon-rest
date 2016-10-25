<?php

return call_user_func(function () {
    $circleCollection = new \Phalcon\Mvc\Micro\Collection();

    $circleCollection
        ->setPrefix('/circles')
        ->setHandler('App\Controller\CircleController', true);

    $circleCollection->get('/', 'index');

    return $circleCollection;
});
