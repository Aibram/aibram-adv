<?php

namespace App\Events\Admin;

use App\Models\Report;

class CommentReportCreated extends BaseEvent
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Report $report,$title)
    {
        $this->eventName = 'comment_report_created';
        $this->title = $title;
        parent::__construct($report);
    }
}
