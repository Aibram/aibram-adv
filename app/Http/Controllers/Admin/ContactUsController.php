<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactUsDataTable;
use App\Http\Requests\Admin\ContactUsCreate;
use App\Http\Requests\Admin\ContactUsUpdate;
use App\Interfaces\ContactUsRepositoryInterface;

class ContactUsController extends BaseController
{
    protected
        $viewPart       = 'contactus',
        $route          = 'admin.contactus',
        $storeRequest   = ContactUsCreate::class,
        $updateRequest  = ContactUsUpdate::class;
    public function __construct(ContactUsRepositoryInterface $repository){
        parent::__construct($repository,ContactUsDataTable::class);
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->all();
        $data['contacted_at'] = now();
        $this->repository->checkRequestCheckBoxExists($data,'contacted');
        $this->repository->updateById($id,$data,false);
        return redirect()->route($this->route.'.index');
    }
}
