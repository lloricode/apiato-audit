<?php

namespace App\Containers\Audit\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class ThisFieldCriteria
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class OneInstanceCriteria extends Criteria
{

    /**
     * @var
     */
    private $classModel;
    private $classModelId;

    public function __construct($classModel, $classModelId)
    {
        $this->classModel = $classModel;
        $this->classModelId = $classModelId;
    }

    /**
     * @param                                                   $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return  mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model
            ->where('auditable_type', $this->classModel)
            ->where('auditable_id', $this->classModelId);
    }
}
