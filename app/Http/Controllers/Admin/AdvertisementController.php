<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdvertisementDataTable;
use App\Http\Requests\Admin\AdvertisementCreate;
use App\Http\Requests\Admin\AdvertisementUpdate;
use App\Interfaces\AdvertisementRepositoryInterface;

class AdvertisementController extends BaseController
{
    protected
        $viewPart       = 'advertisements',
        $route          = 'admin.advertisements',
        $storeRequest   = AdvertisementCreate::class,
        $updateRequest  = AdvertisementUpdate::class;
    public function __construct(AdvertisementRepositoryInterface $repository){
        parent::__construct($repository,AdvertisementDataTable::class);
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->all();
        $this->repository->checkRequestCheckBoxExists($data,'featured');
        $this->repository->checkRequestCheckBoxExists($data,'home');
        $this->repository->updateById($id,$data);
        return redirect()->route($this->route.'.index');
    }
}
