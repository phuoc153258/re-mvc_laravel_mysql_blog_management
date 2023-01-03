<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Traits\Authenticate;
use App\Services\Report\ReportService;


class ReportApiController extends Controller
{
    use HttpResponse;
    use Authenticate;
    protected ReportService $reportService;

    public function __construct()
    {
        $this->reportService = new ReportService();
    }

    public function getList(Request $request)
    {
        try {
            $data = $this->reportService->getList();
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
