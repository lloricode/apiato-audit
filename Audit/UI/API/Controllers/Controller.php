<?php

namespace App\Containers\Audit\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use App\Containers\Audit\UI\API\Requests\GetUserAuditsRequest;
use App\Containers\Audit\UI\API\Requests\GetAuditsByModelAndIdRequest;
use App\Ship\Transporters\DataTransporter;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Audit\UI\API\Transformers\AuditTransformer;

class Controller extends ApiController
{
    public function getAuditsByModelAndId(GetAuditsByModelAndIdRequest $request)
    {
        $res = Apiato::call('Audit@GetAuditsByModelAndIdAction', [new DataTransporter($request)]);
        
        return $this->transform($res, new AuditTransformer);
    }
}
