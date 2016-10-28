<?php

/**
 * phlacon自动加载
 */
require dirname(__DIR__) . '/config/loader.php';

/**
 * 依赖注入、初始化micro
 */
require dirname(__DIR__) . '/bootstrap/app.php';

/**
 * composer自动加载
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Micro 实例
 * @var App
 */
$app = new App();

/**
 * 完成初始化
 */
$app->run();
