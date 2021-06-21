<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Report;

class ReportAdDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('reportaddatatable-table',[
            'id'                =>  'id',
            'user_id'           =>  __('pages.ad_reports.columns.user_id'),
            'user_quote'        =>  __('pages.ad_reports.columns.user_quote'),
            'advertisement'     =>  __('pages.ad_reports.columns.advertisement'),
            'created_at'        =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.ad_reports.get');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('user_id',function ($model) {
                return $model->user->name;
            })
            ->editColumn('user_quote',function ($model) {
                return $model->comment;
            })
            ->editColumn('advertisement',function ($model) {
                $advertisement = $model->reportable;
                return'<a target="_blank" href="'.route('frontend.ad.details',['slug'=>$advertisement->slug]).'">'.$advertisement->title.'</a>';
            })
            ->editColumn('action',function ($model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            'edit'=>'ad_reports.edit',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);

        return $this->datatable->rawColumns(['action','status','advertisement']);
    }

    public function query(Report $model)
    {
        return $model->newQuery()->where('reportable_type','Advertisement');
    }
}