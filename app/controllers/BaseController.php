<?php

namespace App\Controller;

use Phalcon\Mvc\Model;
use Phalcon\Di\Injectable;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\JsonApiSerializer;

class BaseController extends Injectable
{
    private $manager;

    public function __construct()
    {
        $this->setDI(\Phalcon\Di::getDefault());

        $this->manager = new Manager();
        $this->manager->setSerializer(new JsonApiSerializer());
    }

    public function item(Model $model, TransformerAbstract $transformer, $type)
    {
        $resource = new Item($model, $transformer, $type);
        $data = $this->manager->createData($resource)->toArray();

        return $data;
    }

    public function collection(Model $model, TransformerAbstract $transformer, $type)
    {
        $resource = new Collection($model, $transformer, $type);
        $data = $this->manager->createData($resource)->toArray();

        return $data;
    }
}