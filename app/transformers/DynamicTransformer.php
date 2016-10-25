<?php

namespace App\Transformer;

use App\Model\Dynamics;
use App\Model\Transfomer;
use League\Fractal\TransformerAbstract;

class DynamicTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'circle'
    ];

    public function transform(Dynamics $dynamic)
    {
        return [
            'id'                 => (int) $dynamic->id,
            'userId'             => (int) $dynamic->user_id,
            'circleId'           => (int) $dynamic->circle_id,
            'dtype'              => $dynamic->dtype,
            'title'              => $dynamic->title,
            'content'            => json_decode($dynamic->content),
            'tag'                => $dynamic->tag,
            'commentCount'       => (int) $dynamic->count_of_comment,
            'favoriteCount'      => (int) $dynamic->count_of_favorite,
            'participationCount' => (int) $dynamic->count_of_participation,
            'createTime'         => $dynamic->created_at,
            /*'links'              => [
                [
                    'rel' => 'self',
                    'uri' => '/dynamics/' . $dynamic->id,
                ]
            ],*/
        ];
    }

    public function includeCircle(Dynamics $dynamic)
    {
        $circle = $dynamic->circle;

        return $this->item($circle, new CircleTransformer(), 'circles');
    }
}