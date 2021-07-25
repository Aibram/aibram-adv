<?php

namespace App\DataTables;

use App\Classes\DatatableAction;
use App\Models\Advertisement;

class AdvertisementDataTable extends BaseDatatable
{
    public $filters = ['user_id','city_id','category_id','title','price_from','price_to','date_from','date_to'];
    public function __construct()
    {
        parent::__construct('advertisementsdatatable-table',[
            'uid'           =>  'id',
            'photo'        =>  __('pages.advertisements.columns.photo'),
            'title'        =>  __('pages.advertisements.columns.title'),
            'mobile'       =>  __('pages.advertisements.columns.mobile'),
            'user'         =>  __('pages.advertisements.columns.user'),
            'city_name'    =>  __('pages.advertisements.columns.city_id'),
            'category_name'=>  __('pages.advertisements.columns.subcategory_id'),
            'featured'     =>  __('pages.columns.featured'),
            'home'         =>  __('pages.columns.home'),
            'status'       =>  __('pages.columns.status'),
            'no_properties'=>  __('pages.advertisements.columns.no_properties'),
            'no_visits'    =>  __('pages.advertisements.columns.no_visits'),
            'no_ratings'   =>  __('pages.advertisements.columns.no_ratings'),
            'no_favorites' =>  __('pages.advertisements.columns.no_favorites'),
            'created_at'   =>  __('pages.columns.created_at'),
        ],new DatatableAction(),'pages.advertisements.get');      
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
            ->editColumn('user',function ($model) {
                return $model->user->name;
            })
            ->editColumn('mobile',function ($model) {
                return $model->ad_mobile;
            })
            ->editColumn('title',function ($model) {
                return'<a target="_blank" href="'.route('frontend.ad.details',['slug'=>$model->slug]).'">'.$model->title.'</a>';
            })
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
                            'view'=>'advertisements.show',
                            'edit'=>'advertisements.edit',
                            'delete'=>'advertisements.destroy',
                        ]
                    ]);
            });
            $this->formatDateColumn(['created_at']);
            $this->formatBooleanColumn('status');
            $this->formatBooleanColumn('featured');
            $this->formatBooleanColumn('home');
        return $this->datatable->rawColumns(['action','status','title','featured','home','photo']);
    }

    public function query(Advertisement $model)
    {
        $query = $model->newQuery();
        if($this->user_id){
            $query = $query->where(['user_id'=>$this->user_id]);
        }
        if($this->city_id){
            $query = $query->where(['city_id'=>$this->city_id]);
        }
        if($this->category_id){
            $query = $query->whereIn('category_id',explode(",",$this->category_id));
        }
        if($this->title){
            $query = $query->where('title','like',"%$this->title%");
        }
        if($this->price_from){
            $query = $query->where('price','>=',$this->price_from);
        }
        if($this->price_to){
            $query = $query->where('price','<=',$this->price_from);
        }
        if($this->date_from){
            $query = $query->where('created_at','>=',$this->date_from);
        }
        if($this->date_to){
            $query = $query->where('created_at','<=',$this->date_to);
        }
        return $query;
    }

    public function ajaxData(){
        $newArr = [];
        foreach($this->filters as $attribute)
            $newArr[$attribute] = '$("[name='.$attribute.']").val();';
        return $newArr;
    }
}
