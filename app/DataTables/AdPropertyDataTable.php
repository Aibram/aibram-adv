<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\AdProperty;

class AdPropertyDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('propertiesdatatable-table',[
            'property'                 =>  __('pages.advertisements.properties'),
            'advertisement_id'         =>  __('pages.advertisements.advertisement_id'),
        ],new DatatableAction(),'pages.advertisements.properties');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('advertisement_id',function ($model) {
                return $model->advertisement->title;
            })
            ;
        return $this->datatable->rawColumns(['status']);
    }
    public function query(AdProperty $model)
    {
        $query = $model->newQuery();
        if($this->advertisement_id){
            $query = $query->where(['advertisement_id'=>$this->advertisement_id]);
        }
        return $query;
    }
}
