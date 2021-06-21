<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\ReportRepositoryInterface;
use App\DataTables\ReportCommentDataTable;
use App\Facades\NotificationInitator;
use App\Http\Requests\Admin\CommentReportUpdate;
use App\Notifications\AdminSendNotification;
use App\Notifications\CommentRemovedAdmin;
use App\Notifications\ReportConfirmed;

class CommentReportController extends BaseController
{
    protected
        $viewPart       = 'comment_reports',
        $route          = 'admin.comment_reports',
        $updateRequest  = CommentReportUpdate::class;
    public function __construct(ReportRepositoryInterface $repository){
        parent::__construct($repository,ReportCommentDataTable::class);
    }

    public function update($id)
    {
        $request = app($this->updateRequest);
        $data = $request->notify;
        $row = $this->repository->findById($id);
        if($data){
            NotificationInitator::init($row,'report',$data,$row->reportable->user,AdminSendNotification::class);
        }
        NotificationInitator::init($row,'report',__('notifications.report_confirmed'),$row->user,ReportConfirmed::class);
        NotificationInitator::init($row,'report',__('notifications.comment_removed_admin',['title' => $row->reportable->comment]),$row->reportable->user,CommentRemovedAdmin::class);
        $row->reportable->delete();
        // $row->delete();
        return redirect()->route($this->route.'.index');
    }
}