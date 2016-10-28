<?php

namespace App\Controller;

use App\Model\Dynamics;
use App\Controller\BaseController;
use App\Transformer\DynamicTransformer;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;

class DynamicController extends BaseController
{
    public function index()
    {
        $dynamic = Dynamics::findFirst(2);

        return $this->item($dynamic, new DynamicTransformer(), 'dynamics');
    }
}
