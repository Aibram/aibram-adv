<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SettingsDataTable;
use App\Http\Requests\Admin\SettingsCreate;
use App\Http\Requests\Admin\SettingsUpdate;
use App\Interfaces\SettingsRepositoryInterface;

class SettingsController extends BaseController
{
    protected
        $viewPart       = 'settings',
        $route          = 'admin.settings',
        $storeRequest   = SettingsCreate::class,
        $updateRequest  = SettingsUpdate::class;
    public function __construct(SettingsRepositoryInterface $repository){
        parent::__construct($repository,SettingsDataTable::class);
    }

    public function edit($id)
    {
        $item = $this->repository->findById($id);
        $item->value = $item->type=="select" ? explode(",",$item->value) : $item->value;
        return view($this->fullView.'.update')
        ->with('data',$item);
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->all();
        $data['value'] = is_array($data['value']) ? implode(",",$data['value']) : $data['value'];
        // dd($data);
        $this->repository->updateById($id,$data);
        return redirect()->route($this->route.'.index');
    }
}
