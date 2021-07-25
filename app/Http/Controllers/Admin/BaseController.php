<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BaseDatatable;
use App\Http\Controllers\Controller;
use App\Interfaces\BaseInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected 
                $repository,
                $view = 'admin::pages.',
                $viewPart,
                $createReq,
                $updateReq,
                $route,
                $datatable,
                $redirectTo = '/admin',
                $guard = "admin",
                $me,
                $fullView;
    public function __construct(BaseInterface $repository,$datatable)
    {
        $this->repository = $repository;
        $this->datatable = $datatable;
        $this->fullView = $this->view.$this->viewPart;
        $this->me = currUser('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatable = app($this->datatable);
        return $datatable->render($this->fullView.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->fullView.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $request = app($this->storeRequest);
        $model = $this->repository->create($request->all());
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'store']);
        return redirect()->route($this->route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return view($this->fullView.'.view')
        ->with('data',$this->repository->findById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $request = app($this->updateRequest);
        return view($this->fullView.'.update')
        ->with('data',$this->repository->findById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = app($this->updateRequest);
        $model = $this->repository->updateById($id,$request->all());
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'update']);
        return redirect()->route($this->route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->repository->deleteById($id);
        logAction($this->me,$model);
        return redirect()->route($this->route.'.index');
    }
}
