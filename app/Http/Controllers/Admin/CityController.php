<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CityDataTable;
use App\Http\Requests\Admin\CityCreate;
use App\Http\Requests\Admin\CityUpdate;
use App\Interfaces\CityRepositoryInterface;

class CityController extends BaseController
{
    protected
        $viewPart       = 'cities',
        $route          = 'admin.cities',
        $storeRequest   = CityCreate::class,
        $updateRequest  = CityUpdate::class;
    public function __construct(CityRepositoryInterface $repository){
        parent::__construct($repository,CityDataTable::class);
    }
}