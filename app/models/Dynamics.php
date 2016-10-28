<?php

namespace App\Model;

use Phalcon\Mvc\Model;

class Dynamics extends Model
{
    public $circle_id;

    public $id;

    public function initialize()
    {
        $this->belongsTo(
            "circle_id",
            "App\Model\Circles",
            "id"
        );

        $this->belongsTo(
            'user_id',
            'App\Model\Users',
            'id'
        );
    }

    public function getCircle($param = null)
    {
        return $this->getRelated('App\Model\Circles', $param);
    }

    public function getUser($param = null)
    {
        return $this->getRelated('App\Model\Users', $param);
    }
}