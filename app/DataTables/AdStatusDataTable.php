<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\AdStatus;

class AdStatusDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('statusesdatatable-table',[
            'status'                   =>  __('pages.advertisements.statuses'),
            'advertisement_id'         =>  __('pages.advertisements.advertisement_id'),
        ],new DatatableAction(),'pages.statuses.get');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('advertisement_id',function ($model) {
                return $model->advertisement->title;
            })
            ;
            $this->formatBooleanColumn('status');
            $this->formatDateColumn(['created_at']);

        return $this->datatable->rawColumns(['status']);
    }

    public function query(AdStatus $model)
    {
        $query = $model->newQuery();
        if($this->advertisement_id){
            $query = $query->where(['advertisement_id'=>$this->advertisement_id]);
        }
        return $query;
    }
}
