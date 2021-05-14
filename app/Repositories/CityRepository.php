<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository extends BaseAbstract implements CityRepositoryInterface
{
    
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
}
