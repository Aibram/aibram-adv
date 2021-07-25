<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReportAdDataTable;
use App\Facades\NotificationInitator;
use App\Http\Requests\Admin\AdReportUpdate;
use App\Interfaces\ReportRepositoryInterface;
use App\Notifications\AdminSendNotification;
use App\Notifications\AdRemovedAdmin;
use App\Notifications\ReportConfirmed;

class AdReportController extends BaseController
{
    protected
        $viewPart       = 'ad_reports',
        $route          = 'admin.ad_reports',
        $updateRequest  = AdReportUpdate::class;
    public function __construct(ReportRepositoryInterface $repository){
        parent::__construct($repository,ReportAdDataTable::class);
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->notify;
        $model = $this->repository->findById($id);
        if($data){
            NotificationInitator::init($model,'admin_notification',$data,$model->reportable->user,AdminSendNotification::class);
        }
        NotificationInitator::init($model,'ad_report_confirmed',__('notifications.report_confirmed'),$model->user,ReportConfirmed::class);
        NotificationInitator::init($model,'ad_removed_admin',__('notifications.ad_removed_admin',['title' => $model->reportable->title]),$model->reportable->user,AdRemovedAdmin::class);
        $model->reportable->update(['status'=>0]);
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'update']);
        // $row->delete();
        return redirect()->route($this->route.'.index');
    }
}