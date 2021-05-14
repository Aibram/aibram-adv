<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('categoriesdatatable-table',[
            'id'           =>  'id',
            'name'         =>  __('pages.categories.columns.name'),
            'home'         =>  __('pages.categories.columns.home'),
            'main'         =>  __('pages.categories.columns.main'),
            'no_ads'       =>  __('pages.categories.columns.no_ads'),
            'status'       =>  __('pages.columns.status'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.categories.get');
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
                            'view'=>'categories.show',
                            'edit'=>'categories.edit',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');

        return $this->datatable->rawColumns(['action','status']);
    }

    public function query(Category $model)
    {
        return $model->newQuery();
    }
}
