<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\ActivationCodeRepositoryInterface;
use App\Models\ActivationCode;

class ActivationCodeRepository extends BaseAbstract implements ActivationCodeRepositoryInterface
{
    
    public function __construct(ActivationCode $model)
    {
        parent::__construct($model);
    }
}
