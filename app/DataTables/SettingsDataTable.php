<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Setting;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class SettingsDataTable extends BaseDatatable
{

    public function __construct()
    {
        parent::__construct('settingsdatatable-table',[
            'id'           =>  'id',
            'key_explained'=>  __('pages.settings.columns.key_explained'),
            'value'        =>  __('pages.settings.columns.value'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.settings.get');
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
        ->eloquent($query)
        ->editColumn('action',function ($model) {
            return (string)view('admin::partials.datatables.actions',
                [
                    'model'=>$model,
                    'model_name'=>$model->getTable(),
                    'viewPrefix' => 'admin.',
                    'actions'=>[
                        'edit'=>'settings.save',
                    ]
                ]);
        });
        $this->formatDateColumn(['created_at']);
        return $this->datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \Setting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Setting $model)
    {
        return $model->newQuery();
    }
}
