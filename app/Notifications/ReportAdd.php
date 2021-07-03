<?php

namespace App\Notifications;

use App\Events\Admin\AdvertisementReportCreated;
use App\Events\Admin\CommentReportCreated;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;

class ReportAdd extends BaseNotification
{
    public function __construct(Report $data)
    {
        parent::__construct($data);
        if($data->reportable_type == "Advertisement"){
            event(new AdvertisementReportCreated($data,__('notifications.admin.new_report')));
        }
        else{
            event(new CommentReportCreated($data,__('notifications.admin.new_report')));
        }
    }
}