<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserDataTable extends BaseDatatable
{
    public function __construct()
    {
        parent::__construct('usersdatatable-table',[
            'id'           =>  'id',
            'photo'        =>  __('pages.users.columns.photo'),
            'name'         =>  __('pages.users.columns.username'),
            'mobile'       =>  __('pages.users.columns.mobile'),
            'country'      =>  __('pages.users.columns.country'),
            'city'         =>  __('pages.users.columns.city'),
            'gender'       =>  __('pages.users.columns.gender'),
            'activated'    =>  __('pages.users.columns.activated'),
            'status'       =>  __('pages.columns.status'),
            'no_ads'       =>  __('pages.users.columns.no_ads'),
            'no_chats'     =>  __('pages.users.columns.no_chats'),
            'no_ratings'   =>  __('pages.users.columns.no_ratings'),
            'no_favorites' =>  __('pages.users.columns.no_favorites'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.users.get');
    }
    
    public function dataTable($query)
    {
        $this->datatable = $this->datatable
            ->eloquent($query)
            ->editColumn('country',function (User $model) {
                return $model->country->name;
            })
            ->editColumn('city',function (User $model) {
                return $model->city->name;
            })
            ->editColumn('gender',function (User $model) {
                return getGenderTypes()[$model->gender];
            })
            ->editColumn('photo',function (User $model) {
                return '<span class="kt-userpic kt-margin-t-5">
                            <img src="'.$model->getFirstMediaUrl($model->mainImageCollection, 'user_thumb').'" alt="user">
                        </span>';
            })
            ->editColumn('action',function (Model $model) {
//                $actions=['edit','view','delete'];
                return (string)view('admin::partials.datatables.actions',
                    [
                        'model'=>$model,
                        'model_name'=>$model->getTable(),
                        'viewPrefix' => 'admin.',
                        'actions'=>[
                            // 'view'=>'users.show',
                            'edit'=>'users.edit',
                            'delete'=>'users.destroy',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');
        return $this->datatable->rawColumns(['action','status','photo']);
    }

    public function query(User $model)
    {
        return $model->newQuery();
    }
}
