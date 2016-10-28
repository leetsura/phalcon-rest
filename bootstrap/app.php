<?php

require 'service.php';

class App
{
    public function run()
    {
        $di = (new Services())->initDi();
        $app = new \Phalcon\Mvc\Micro();
        $app->setDI($di);

        foreach ($di->getCollections() as $collection) {
            $app->mount($collection);
        }

        $app->get(
            '/',
            function () {
                echo "welcome";
            }
        );

        $app->notFound(
            function () {
                throw new App\Exception\HTTPException(
                    404,
                    'RT10004',
                    '请求错误',
                    '该路由不存在.'
                );
            }
        );

        $app->after(
            function () use ($app) {
                $records = $app->getReturnedValue();
                $response = new \App\Response\JsonResponse();

                $response->send($records);
            }
        );

        set_exception_handler(function ($exception) use ($app) {
            if (is_a($exception, 'App\Exception\HTTPException')) {
                $exception->send();
            }

            error_log($exception, 3, 'httpException.log');
            error_log($exception->getTraceAsString(), 3, 'httpException.log');
        });

        $app->handle();
    }
}