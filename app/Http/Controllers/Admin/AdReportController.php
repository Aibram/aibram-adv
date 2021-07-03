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
        $row = $this->repository->findById($id);
        if($data){
            NotificationInitator::init($row,'admin_notification',$data,$row->reportable->user,AdminSendNotification::class);
        }
        NotificationInitator::init($row,'ad_report_confirmed',__('notifications.report_confirmed'),$row->user,ReportConfirmed::class);
        NotificationInitator::init($row,'ad_removed_admin',__('notifications.ad_removed_admin',['title' => $row->reportable->title]),$row->reportable->user,AdRemovedAdmin::class);
        $row->reportable->update(['status'=>0]);
        // $row->delete();
        return redirect()->route($this->route.'.index');
    }
}