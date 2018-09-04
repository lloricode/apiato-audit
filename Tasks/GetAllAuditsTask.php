<?php

namespace App\Containers\Audit\Tasks;

use App\Containers\Audit\Data\Repositories\AuditRepository;
use App\Ship\Parents\Tasks\Task;
use App\Ship\Exceptions\NotFoundException;
use App\Containers\Audit\Data\Criterias\OneInstanceCriteria;

class GetAllAuditsTask extends Task
{
    protected $repository;

    public function __construct(AuditRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($classModel, $id)
    {
        try {
            $this->repository->pushCriteria(new OneInstanceCriteria($classModel, $id));
            return $this->repository->paginate();
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
