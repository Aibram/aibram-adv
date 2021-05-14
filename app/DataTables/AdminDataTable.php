<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class AdminDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('adminsdatatable-table',[
            'id'           =>  'id',
            'first_name'   =>  __('pages.admins.columns.first_name'),
            'last_name'    =>  __('pages.admins.columns.last_name'),
            'email'        =>  __('pages.admins.columns.email'),
            'username'     =>  __('pages.admins.columns.username'),
            'status'       =>  __('pages.columns.status'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.admins.get');
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
                            // 'view'=>'admins.show',
                            'edit'=>'admins.edit',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');

        return $this->datatable->rawColumns(['action','status']);
    }

    public function query(Admin $model)
    {
        return $model->newQuery();
    }
}
