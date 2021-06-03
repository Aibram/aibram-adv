<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\RatingRepositoryInterface;
use App\Models\UserRating;

class RatingRepository extends BaseAbstract implements RatingRepositoryInterface
{
    public function __construct(UserRating $model)
    {
        parent::__construct($model);
    }
}
