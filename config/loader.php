<?php

use Phalcon\Loader;
use Phalcon\Config\Adapter\Ini as ConfigIni;

$loader = new Loader();
$config = new ConfigIni(dirname(__DIR__) . '/config/config.ini');

$loader->registerNamespaces(
    [
        'App\Model'       => dirname(__DIR__) . '/' . $config->application->modelsDir,
        'App\Response'    => dirname(__DIR__) . '/' . $config->application->responsesDir,
        'App\Exception'   => dirname(__DIR__) . '/' . $config->application->exceptionsDir,
        'App\Controller'  => dirname(__DIR__) . '/' . $config->application->controllersDir,
        'App\Validation'  => dirname(__DIR__) . '/' . $config->application->validationsDir,
        'App\Transformer' => dirname(__DIR__) . '/' . $config->application->transformersDir,
    ]
)->register();
