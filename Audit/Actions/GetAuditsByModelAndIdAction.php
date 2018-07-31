<?php

namespace App\Containers\Audit\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use App\Ship\Exceptions\NotFoundException;

class GetAuditsByModelAndIdAction extends Action
{
    public function run(DataTransporter $data)
    {
        $configContainer = config('audit-container.allowed_models');

        $words = explode('-', strtolower($data->model));
        $data->model = "";
        foreach ($words as $w => $word) {
            $data->model .= ucfirst($word);
        }


        if (count($configContainer) > 0) {
            $isModelAllowed = in_array($data->model, $configContainer);
            
            if (!$isModelAllowed or empty($data->id)) {
                throw new NotFoundException;
            }
        }

        $classModel = 'App\\Containers\\'. $data->model .'\\Models\\'. $data->model;

        return Apiato::call(
            'Audit@GetAllAuditsTask',
            [$classModel, $data->id],
        [
            'addRequestCriteria',
        ]
        );
    }
}
