<?php

namespace App\Services\Report;

use App\Models\Report;
use App\Services\Report\IReportService;

class ReportService implements IReportService
{
    public function __construct()
    {
    }

    public function getList(): mixed
    {
        $reports = Report::all();
        return $reports;
    }
}
