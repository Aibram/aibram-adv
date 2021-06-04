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
}
