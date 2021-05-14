<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryCreate;
use App\Http\Requests\Admin\CategoryUpdate;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryController extends BaseController
{
    protected
        $viewPart       = 'categories',
        $route          = 'admin.categories',
        $storeRequest   = CategoryCreate::class,
        $updateRequest  = CategoryUpdate::class;
    public function __construct(CategoryRepositoryInterface $repository){
        parent::__construct($repository,CategoryDataTable::class);
    }
}
