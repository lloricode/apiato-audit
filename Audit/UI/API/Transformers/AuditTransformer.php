<?php

namespace App\Containers\Audit\UI\API\Transformers;

use App\Containers\Audit\Models\Audit;
use App\Ship\Parents\Transformers\Transformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;

class AuditTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user'
    ];

    /**
     * @param Audit $entity
     *
     * @return array
     */
    public function transform(Audit $entity)
    {
        $response = [
            'object' => 'Audit',
            'id' => $entity->getHashedKey(),
            'user_id' => $entity->user->getHashedKey(),

            "event"=> $entity->event,
            'old_values' => $entity->old_values,
            'new_values' => $entity->new_values,
            'url'=> $entity->url,
            'ip_address'=> $entity->ip_address,
            'user_agent'=> $entity->user_agent,
            'tags'=> $entity->tags,

            'created_at' => (string) $entity->created_at,
            'updated_at' => (string) $entity->updated_at,
            'readable_created_at'  => $entity->created_at->diffForHumans(),
            'readable_updated_at'  => $entity->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            'real_user_id'    => $entity->user->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    public function includeUser(Audit $audit)
    {
        return $this->item($audit->user, new UserTransformer);
    }
}
