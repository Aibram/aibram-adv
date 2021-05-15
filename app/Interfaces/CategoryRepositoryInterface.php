<?php

namespace App\Interfaces;


interface CategoryRepositoryInterface  extends BaseInterface
{
    public function getTreeView($parent_id);
}
