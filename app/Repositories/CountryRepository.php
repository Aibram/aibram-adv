<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;

class CountryRepository extends BaseAbstract implements CountryRepositoryInterface
{
    
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }
}
