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

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->all();
        $data['icon'] = $request->input('icon','');
        $model = $this->repository->updateById($id,$data);
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'update']);
        return redirect()->route($this->route.'.index');
    }
}
