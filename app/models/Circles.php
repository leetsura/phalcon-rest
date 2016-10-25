<?php

namespace App\Model;

use Phalcon\Mvc\Model;

class Circles extends Model
{
    public $id;

    public function initialize()
    {

        $this->hasMany(
            'id',
            'App\Models\Dynamics',
            'circle_id'
        );
    }
}
