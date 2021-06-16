<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\ContactUs;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactUsDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('citiesdatatable-table',[
            'id'           =>  'id',
            'name'         =>  __('pages.contactus.columns.name'),
            'mobile'       =>  __('pages.contactus.columns.mobile'),
            'subject'      =>  __('pages.contactus.columns.subject'),
            'device'       =>  __('pages.contactus.columns.device'),
            'contacted'    =>  __('pages.contactus.columns.contacted'),
            'contacted_at' =>  __('pages.contactus.columns.contacted_at'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.contactus.get');        
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
                $actions=['view'=>'contactus.show'];
                if(!$model->contacted){
                    $actions['edit'] = 'contactus.confirm';
                }
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>$actions
                    ]);
            });
            $this->formatDateColumn(['created_at','contacted_at']);
            $this->handleFormatBoolean('contacted',getContactUsStatuses());
            $this->handleFormatBoolean('device',getContactUsDevices());
        return $this->datatable->rawColumns(['action','contacted','device']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \ContactUs $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactUs $model)
    {
        return $model->newQuery();
    }
}
