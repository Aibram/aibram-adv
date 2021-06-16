<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Testimonial;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('testimonialsdatatable-table',[
            'id'           =>  'id',
            'photo'        =>  __('pages.testimonials.columns.photo'),
            'name'         =>  __('pages.testimonials.columns.name'),
            'job'         =>  __('pages.testimonials.columns.job'),
            'content'       =>  __('pages.testimonials.columns.content'),
            'status'       =>  __('pages.columns.status'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.testimonials.get');
    }

    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('photo',function ($model) {
                return '<span class="kt-userpic kt-margin-t-5">
                            <img src="'.$model->photo.'" alt="user">
                        </span>';
            })
            ->editColumn('action',function ($model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            // 'view'=>'countries.show',
                            'edit'=>'testimonials.edit',
                            'delete'=>'testimonials.destroy',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');

        return $this->datatable->rawColumns(['action','status','photo']);
    }

    public function query(Testimonial $model)
    {
        return $model->newQuery();
    }
}
