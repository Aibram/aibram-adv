<?php


namespace App\DataTables;

use App\Classes\DatatableAction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BaseDatatable extends DataTable
{
    protected $datatable;
    protected $id;
    protected $sheetName;
    protected $columns;
    protected $actionColumn;
    protected $formattedColumns;
    protected $statues;

    /**
     * BaseDatatable constructor.
     * @param $datatable
     */
    public function __construct($id,$columns,DatatableAction $da,$appNameTrans="base.appName")
    {
        $this->datatable = datatables();
        $this->builder = $this->builder();
        $this->statues = getAvailStatuses();
        $this->id = $id;
        $this->columns = $columns;
        $this->actionColumn = $da;
        $this->sheetName = __($appNameTrans).'_';
        $this->formatColumns();
    }

    private function formatColumns(){
        $formattedColumns = [];
        foreach($this->columns as $name =>$column){
            array_push($formattedColumns,Column::make($name)->title($column));
        }
        array_push($formattedColumns,$this->actionColumn->formatAction());
        $this->formattedColumns = $formattedColumns;
    }
    public function formatDateColumn($columns){
        foreach ($columns as $column){
            $this->datatable = $this->datatable->editColumn($column,function ($model) use($column) {
                return $model->{$column}->diffForHumans();
            });
        }
    }
    public function formatBooleanColumn($column){
        
        $this->datatable = $this->datatable->editColumn($column,function ($model) use($column) {
            return '<span class="kt-badge  kt-badge--'.$this->statues[$model->{$column}]['badge'].' kt-badge--inline kt-badge--pill">'.$this->statues[$model->{$column}]['text'].'</span>';            
        });
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId($this->id)
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('lrtip')
                    ->orderBy(0)
                    ->scrollX(true)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print')
                    );
    }

    public function getColumns()
    {
        return $this->formattedColumns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return $this->sheetName . date('YmdHis');
    }

}
