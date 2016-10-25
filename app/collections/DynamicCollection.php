<?php

return call_user_func(function () {
    $dynamicCollection = new \Phalcon\Mvc\Micro\Collection();
    $dynamicCollection
        ->setPrefix('/dynamics')
        ->setHandler('App\Controller\DynamicController', true);

    $dynamicCollection->get('/', 'index');

    return $dynamicCollection;
});
