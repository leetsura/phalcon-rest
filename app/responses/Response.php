<?php

namespace App\Response;

class Response extends \Phalcon\Di\Injectable
{
    public function __construct()
    {
        $this->setDI(\Phalcon\Di::getDefault());
    }
}