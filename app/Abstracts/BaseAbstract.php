<?php

namespace App\Abstracts;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Optix\Media\MediaUploader;

abstract class BaseAbstract implements BaseInterface
{
    protected $model;
    protected $originalModel;
    protected $default_image;
    protected $domain;
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->originalModel = $model;
        // $this->default_image= get_image_url(config('media.default-img'));
        $this->domain =url("/");

    }

    public function getModel()
    {
        return $this->model;
    }

    public function getTable()
    {
        return $this->model->getTable();
    }

    public function checkRequestCheckBoxExists(&$data,$column = "status"){
        $data[$column] = isset($data[$column]) ? 1: 0;
    }

    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = [])
    {
    
        $this->make($with);

        if (!empty($select)) {
            $data = $this->model->where($condition)->select($select);
        } else {
            $data = $this->model->where($condition);
        }

        return $data->first();
    }

    public function make(array $with = [])
    {
        if (!empty($with)) {
            $this->model = $this->model->with($with);
        }
        return $this->model;
    }

    public function findById($id, array $with = [])
    {
        $data = $this->findOrFail($id,$with);
        $this->resetModel();
        return $data;
    }

    public function findByHashId($id, array $with = [])
    {
        $data = $this->make($with)->findByHashid($id);
        $this->resetModel();
        return $data;
    }

    public function findOrFail($id, array $with = [])
    {
        $data = $this->make($with)->findOrFail($id);
        $this->resetModel();
        return $data;
    }

    public function attachMedia($file,&$model = null,$mediaGroup=''){
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        $media = $this->mediaUploader($file);
        if($mediaGroup)
            $newModel->attachMedia($media,$mediaGroup);
        else
            $newModel->attachMedia($media);
        return $newModel;
    }

    public function detachMedia(&$model = null,$media=null,$mediaGroup=null){
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }

        if($mediaGroup)
            $newModel->clearMediaGroup($mediaGroup);
        else
            $newModel->detachMedia($media);
        
        return $newModel;
    }

    public function mediaUploader($requestFile){

        return MediaUploader::fromFile($requestFile)->upload();
    }

    public function all(array $with = [])
    {
        $data = $this->make($with);

        return $data->get();
    }

    public function pluck($column, $key = null)
    {
        $select = [$column];
        if (!empty($key)) {
            $select = [$column, $key];
        }

        $data = $this->model->select($select);

        return $data->pluck($column, $key)->all();
    }

    public function allBy(array $condition, array $with = [], array $select = ['*'],$ordering=[],$scopes=[])
    {
        $this->applyConditions($condition);
        $this->setScopes($scopes);
        $data = $this->make($with)->select($select);
        $data = $this->orderBy($ordering);
        return $data->get();
    }

    public function create(array $data,$checkStatus=true)
    {
        if($checkStatus)
            $this->checkRequestCheckBoxExists($data);
        $data = $this->model->create($data);
        $this->resetModel();
        toastr()->success(__('base.success.created'), __('base.success.done'));
        return $data;
    }

    public function createOrUpdate($data, $condition = [])
    {
        /**
         * @var Model $item
         */
        if (is_array($data)) {
            if (empty($condition)) {
                $item = new $this->model;
            } else {
                $item = $this->getFirstBy($condition);
            }
            if (empty($item)) {
                $item = new $this->model;
            }

            $item = $item->fill($data);
        } elseif ($data instanceof Model) {
            $item = $data;
        } else {
            return false;
        }

        if ($item->save()) {
            $this->resetModel();
            return $item;
        }

        $this->resetModel();

        return false;
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function firstOrCreate(array $data, array $with = [])
    {
        $data = $this->model->firstOrCreate($data, $with);

        $this->resetModel();

        return $data;
    }

    public function update(array $condition, array $data)
    {
        $data = $this->model->where($condition)->update($data);
        $this->resetModel();
        return $data;
    }

    public function updateById(String $id, array $data,$checkStatus=true)
    {
        $model = $this->findById($id);
        if($checkStatus)
            $this->checkRequestCheckBoxExists($data);
        $model->update($data);
        $this->resetModel();
        toastr()->success(__('base.success.updated'), __('base.success.done'));

        return $model;
    }


    public function select(array $select = ['*'], array $condition = [])
    {
        $data = $this->model->where($condition)->select($select);
        return $data;
    }
    public function orderBy(array $columns = [])
    {
        $data = $this->model;
        foreach ($columns as $column => $direction) {
            $data = $data->orderBy($column, $direction);
        }
        return $data;
    }

    public function deleteBy(array $condition = [])
    {
        $this->applyConditions($condition);

        $data = $this->model->get();

        if (empty($data)) {
            return false;
        }
        foreach ($data as $item) {
            $item->delete();
        }
        $this->resetModel();
        return true;
    }

    public function deleteById(String $id)
    {
        $item = $this->findById($id);
        $resp = $item->delete();
        $this->resetModel();
        toastr()->success(__('base.success.deleted'), __('base.success.done'));
        return $resp;
    }

    public function count(array $condition = [])
    {
        $this->applyConditions($condition);
        $data = $this->model->count();

        $this->resetModel();

        return $data;
    }

    public function getByCondition(array $args = [])
    {
        
        if (!empty(array_get($args, 'where'))) {
            $this->applyConditions($args['where']);
        }
        $data = $this->model;
        if (!empty(array_get($args, 'paginate'))) {
            $data = $data->paginate($args['paginate']);
        } elseif (!empty(array_get($args, 'limit'))) {
            $data = $data->limit($args['limit']);
        } else {
            $data = $data->get();
        }

        return $data;
    }

    public function resetModel()
    {
        $this->model = new $this->originalModel;
        $this->skipCriteria = false;
        $this->criteria = [];
        return $this;
    }

    protected function applyConditions(array $where, &$model = null)
    {
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        foreach ($where as $field => $value) {
            if (is_array($value)) {
                list($field, $condition, $val) = $value;
                switch (strtoupper($condition)) {
                    case 'IN':
                        $newModel = $newModel->whereIn($field, $val);
                        break;
                    case 'NOT_IN':
                        $newModel = $newModel->whereNotIn($field, $val);
                        break;
                    default:
                        $newModel = $newModel->where($field, $condition, $val);
                        break;
                }
            } else {
                $newModel = $newModel->where($field, '=', $value);
            }
        }
        if (!$model) {
            $this->model = $newModel;
        } else {
            $model = $newModel;
        }
    }

    protected function setScopes($scopes=[], &$model = null)
    {
        if (!$model) {
            $newModel = $this->model;
        } else {
            $newModel = $model;
        }
        foreach ($scopes as $method => $args) {
            $newModel->$method(implode(', ', $args));
        }

    }

    public function advancedGet(array $params = [])
    {
        $params = array_merge([
            'condition' => [],
            'order_by' => [],
            'take' => null,
            'paginate' => [
                'per_page' => null,
                'current_paged' => 1,
            ],
            'select' => ['*'],
            'with' => [],
        ], $params);

        $this->applyConditions($params['condition']);

        $data = $this->model;

        if ($params['select']) {
            $data = $data->select($params['select']);
        }

        foreach ($params['order_by'] as $column => $direction) {
            if ($direction !== null) {
                $data = $data->orderBy($column, $direction);
            }
        }

        foreach ($params['with'] as $with) {
            $data = $data->with($with);
        }

        if ($params['take'] == 1) {
            $result = $data->first();
        } elseif ($params['take']) {
            $result = $data->take($params['take'])->get();
        } elseif ($params['paginate']['per_page']) {
            $paginate_type = 'paginate';
            if (array_get($params, 'paginate.type') && method_exists($data, array_get($params, 'paginate.type'))) {
                $paginate_type = array_get($params, 'paginate.type');
            }
            $result = $data
                ->$paginate_type(
                    array_get($params, 'paginate.per_page', 10),
                    [$this->originalModel->getTable() . '.' . $this->originalModel->getKeyName()],
                    'page',
                    array_get($params, 'paginate.current_paged', 1)
                );
        } else {
            $result = $data->get();
        }

        return $result;
    }

    public function forceDelete(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->forceDelete();
        }
    }

    public function restoreBy(array $condition = [])
    {
        $item = $this->model->where($condition)->withTrashed()->first();
        if (!empty($item)) {
            $item->restore();
        }
    }

    
    public function getFirstByWithTrash(array $condition = [], array $select = [])
    {
        $query = $this->model->where($condition)->withTrashed();

        if (!empty($select)) {
            return $query->select($select)->first();
        }

        return $query->first();
    }

    
    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    
    public function firstOrNew(array $condition)
    {
        $this->applyConditions($condition);

        $result = $this->model->first() ?: new $this->originalModel;

        $this->resetModel();

        return $result;
    }

    public function CheckSingleMediaAndAssign($data,$model,$property,$collection,$update=false){
        if(isset($data[$property]) && $data[$property]!='undefined' && $data[$property]!='null'){
            if($update){
                $this->detachMedia($model,null,$collection);
            }
            $this->attachMedia($data[$property],$model,$collection);
        }
    }

    public function CheckMultipleMedia($data,$model,$property,$collection,$update=false){
        if(isset($data[$property])){
            if($update){
                $this->detachMedia($model,null,$collection);
            }
            foreach($data[$property] as $media){
                $this->attachMedia($media,$model,$collection);
            }
        }
    }
    public function passwordCheck($hashedPassword, $password)
    {
        return Hash::check($password, $hashedPassword);
    }
}
