<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\FavoriteRepositoryInterface;
use App\Models\FavoriteItem;

class FavoriteRepository extends BaseAbstract implements FavoriteRepositoryInterface
{
    public function __construct(FavoriteItem $model)
    {
        parent::__construct($model);
    }
}
