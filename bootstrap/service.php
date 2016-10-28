<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlAdapter;

class Services
{
    public function initDi()
    {
        $di = new FactoryDefault();
        $config = new ConfigIni(dirname(__DIR__) . '/config/config.ini');

        $di->set(
            'collections',
            function () {
                return require(dirname(__DIR__) . '/app/routes.php');
            }
        );

        $di->set(
            'db',
            function () use ($config) {
                return new MysqlAdapter(
                    [
                        'host'     => $config->database->host,
                        'port'     => $config->database->port,
                        'username' => $config->database->username,
                        'password' => $config->database->password,
                        'dbname'   => $config->database->dbname
                    ]
                );
            }
        );

        return $di;
    }
}
