<?php

namespace App\Transformer;

use App\Model\Circles;
use App\Model\Transfomer;
use League\Fractal\TransformerAbstract;

class CircleTransformer extends TransformerAbstract
{
    public function transform(Circles $circle)
    {
        return [
            'id'                => (int) $circle->id,
            'userId'            => (int) $circle->user_id,
            'schoolId'          => (int) $circle->school_id,
            'name'              => $circle->name,
            'type'              => $circle->type,
            'picture'           => $circle->picture,
            'introduction'      => $circle->introduction,
            'dynamicCount'      => (int) $circle->count_of_dynamic,
            'subscriptionCount' => (int) $circle->count_of_subscription,
            'longitude'         => (int) $circle->longitude,
            'latitude'          => $circle->latitude,
            'createTime'        => $circle->created_at,
            /*'links'             => [
                [
                    'rel' => 'self',
                    'uri' => '/circles/' . $circle->id,
                ]
            ],*/
        ];
    }
}