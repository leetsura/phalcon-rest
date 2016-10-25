<?php

return call_user_func(function () {
    $collections = [];
    $collectionFiles = scandir(__DIR__ . '/collections');

    foreach ($collectionFiles as $collectionFile) {
        $pathinfo= pathinfo($collectionFile);

        if ($pathinfo['extension'] == 'php') {
            $collections[] = require(__DIR__ . '/collections/' . $collectionFile);
        }
    }

    return $collections;
});
