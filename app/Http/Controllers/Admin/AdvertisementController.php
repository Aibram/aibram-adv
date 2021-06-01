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
}
