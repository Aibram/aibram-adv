<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class CityDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('citiesdatatable-table',[
            'id'           =>  'id',
            'name'         =>  __('pages.cities.columns.name'),
            'status'       =>  __('pages.columns.status'),
            'country'      =>  __('pages.cities.columns.country'),
            'no_ads'       =>  __('pages.cities.columns.no_ads'),
            'no_users'     =>  __('pages.cities.columns.no_users'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.cities.get');        
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('country',function (City $model) {

                //                $actions=['edit','view','delete'];
                                return $model->country->name;
            })
            ->editColumn('action',function (Model $model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            // 'view'=>'cities.show',
                            'delete'=>'cities.destroy',
                            'edit'=>'cities.edit',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');

        return $this->datatable->rawColumns(['action','status']);
    }

    public function query(City $model)
    {
        return $model->newQuery();
    }
}
