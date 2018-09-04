<?php

namespace App\Containers\Audit\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use App\Ship\Exceptions\NotFoundException;

/**
 * Class AuditRepository
 */
class AuditRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
