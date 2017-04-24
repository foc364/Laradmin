<?php

namespace Larashop\Http\Controllers\Request;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Schedule;
use Response;
use Carbon;
use DB;

class RequestsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getScheduleAvailableList(Request $request)
    {
        $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');

        $scheduleOptions = (new Schedule)->getScheduleOptionFormat($date);

        return Response::json($scheduleOptions);
    }


}