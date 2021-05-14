<?php


namespace App\Classes;

use Yajra\DataTables\Html\Column;

class DatatableAction
{
    private $columnName;
    private $title;
    private $exportable;
    private $printable;
    private $width;
    private $htmlClass;

    public function __construct($columnName = 'action',$titleTrans ='pages.columns.action',$exportable=false,$printable=false,$width=60,$htmlClass='text-center')
    {
        $this->title = __($titleTrans);
        $this->columnName = $columnName;
        $this->exportable = $exportable;
        $this->printable =$printable;
        $this->width = $width;
        $this->htmlClass =$htmlClass;
    }

    public function formatAction(){
        return Column::computed($this->columnName)
                ->title($this->title)
                ->exportable($this->exportable)
                ->printable($this->printable)
                ->width($this->width)
                ->addClass($this->htmlClass);
    }
}
