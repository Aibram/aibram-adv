<?php

namespace App\Repositories;

use App\Abstracts\BaseAbstract;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseAbstract implements CategoryRepositoryInterface
{
    
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getTreeView($parent_id)
    {
        return $this->allBy(['parent_id' => $parent_id])->map->formatTreeJS();
    }
}
