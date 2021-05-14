<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountryDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('countriesdatatable-table',[
            'id'           =>  'id',
            'name'         =>  __('pages.countries.columns.name'),
            'ext'         =>  __('pages.countries.columns.ext'),
            'status'       =>  __('pages.columns.status'),
            'no_ads'       =>  __('pages.countries.columns.no_ads'),
            'no_users'     =>  __('pages.countries.columns.no_users'),
            'no_cities'     =>  __('pages.countries.columns.no_cities'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.countries.get');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('action',function (Model $model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            // 'view'=>'countries.show',
                            'edit'=>'countries.edit',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');

        return $this->datatable->rawColumns(['action','status']);
    }

    public function query(Country $model)
    {
        return $model->newQuery();
    }
}
