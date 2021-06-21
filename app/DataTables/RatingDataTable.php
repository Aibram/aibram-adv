<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\UserRating;

class RatingDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('ratingsdatatable-table',[
            'stars'                    =>  __('pages.rating.stars'),
            'comment'                  =>  __('pages.rating.comment'),
            'user_id'                  =>  __('pages.rating.user'),
            'rated_user_id'            =>  __('pages.rating.rated_user'),
        ],new DatatableAction(),'pages.users.ratings.all');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('user_id',function ($model) {
                return $model->user->name;
            })
            ->editColumn('rated_user_id',function ($model) {
                return $model->ratedUser->name;
            })
            ;
        return $this->datatable->rawColumns(['status']);
    }
    public function query(UserRating $model)
    {
        $query = $model->newQuery();
        if($this->user_id){
            $query = $query->where(['user_id'=>$this->user_id]);
        }
        if($this->advertisement_id){
            $query = $query->where(['advertisement_id'=>$this->advertisement_id]);
        }
        if($this->rated_user_id){
            $query = $query->where(['rated_user_id'=>$this->rated_user_id]);
        }
        return $query;
    }
}
