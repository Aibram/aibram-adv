<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\FavoriteItem;

class FavoriteDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('favoritedatatable-table',[
            'user_id'                  =>  __('pages.favorites.user'),
            'advertisement_id'         =>  __('pages.favorites.advertisement'),
        ],new DatatableAction(),'pages.users.favorites.all');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
           ->eloquent($query)
            ->editColumn('advertisement_id',function ($model) {
                $advertisement = $model->advertisement;
                return'<a target="_blank" href="'.route('frontend.ad.details',['slug'=>$advertisement->slug]).'">'.$advertisement->title.'</a>';
            })
            ->editColumn('user_id',function ($model) {
                return $model->user->name;
            })
            ;
        return $this->datatable->rawColumns(['status','advertisement_id']);
    }
    public function query(FavoriteItem $model)
    {
        $query = $model->newQuery();
        if($this->user_id){
            $query = $query->where(['user_id'=>$this->user_id]);
        }
        if($this->advertisement_id){
            $query = $query->where(['advertisement_id'=>$this->advertisement_id]);
        }
        return $query;
    }
}
