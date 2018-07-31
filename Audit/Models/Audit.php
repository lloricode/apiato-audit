<?php

namespace App\Containers\Audit\Models;

// use App\Ship\Parents\Models\Model;
use OwenIt\Auditing\Models\Audit as AuditBase;
use Apiato\Core\Traits\HashIdTrait;
use Apiato\Core\Traits\HasResourceKeyTrait;

class Audit extends AuditBase
{
    use HashIdTrait;
    use HasResourceKeyTrait;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'audits';
}
