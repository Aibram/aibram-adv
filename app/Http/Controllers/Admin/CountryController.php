<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CountryDataTable;
use App\Http\Requests\Admin\CountryCreate;
use App\Http\Requests\Admin\CountryUpdate;
use App\Interfaces\CountryRepositoryInterface;

class CountryController extends BaseController
{
    protected
        $viewPart       = 'countries',
        $route          = 'admin.countries',
        $storeRequest   = CountryCreate::class,
        $updateRequest  = CountryUpdate::class;
    public function __construct(CountryRepositoryInterface $repository){
        parent::__construct($repository,CountryDataTable::class);
    }
}