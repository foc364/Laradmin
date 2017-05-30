<?php

namespace Larashop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Schedule;
use Response;

class RequestsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getAvailableSchedule(Request $request)
    {
        $schedules = (new Schedule)->getScheduleAvailableOptionFormat($request->date);

        return Response::json($schedules);
    }
}