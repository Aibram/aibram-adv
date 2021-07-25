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
        $model = $this->repository->findById($id);
        if($data){
            NotificationInitator::init($model,'admin_notification',$data,$model->reportable->user,AdminSendNotification::class);
        }
        NotificationInitator::init($model,'comment_report_confirmed',__('notifications.report_confirmed'),$model->user,ReportConfirmed::class);
        NotificationInitator::init($model,'comment_removed_admin',__('notifications.comment_removed_admin',['title' => $model->reportable->comment]),$model->reportable->user,CommentRemovedAdmin::class);
        $model->reportable->delete();
        logAction($this->me,$model,['model'=>$this->repository->getTable(),'operation'=>'update']);
        // $model->delete();
        return redirect()->route($this->route.'.index');
    }
}