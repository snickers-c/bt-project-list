<?php

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Services\TimeService;
use Illuminate\Http\Request;

class TimeRpcController extends Controller
{
    public function getTime(TimeService $timeService) {
        return response("aktuálny čas je {$timeService->time()}");
    }
}