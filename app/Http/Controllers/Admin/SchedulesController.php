<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Schedule;
use Larashop\Models\Place;
use Larashop\Models\HealthInsurance;
use Larashop\Models\Config;
use Larashop\Formatters\PhoneNumber;
use Larashop\Formatters\DateFormatter;
use Carbon;
use DB;
use Lang;

class SchedulesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    	$date = $request->input('date') ?: Carbon::now()->format('d/m/Y');
    	$date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    	
        $schedules = Schedule::where(DB::raw('DATE(date)'),  $date)->get();
	
        $params = [
            'title' => 'Lista de agendamentos',
            'schedules' => $schedules,
            'phoneNumber' => new PhoneNumber,
            'healthInsurances' => HealthInsurance::pluck('name', 'id'),
            'places' => Place::pluck('name', 'id'),
        ];

        return view('admin.schedules.schedules_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $time = (new schedule)->getSchedulesAvailableByDate(date('Y-m-d'));

        $params = [
            'title' => 'Criar Agendamento',
            'places' => Place::where('active', 1)->pluck('name', 'id'),
            'healthInsurances' => HealthInsurance::where('active', 1)->pluck('name', 'id'),
            'time' => !empty($time) ? (new schedule)->formatScheduleKeyValueEqual($time) : ['' => 'Agenda Lotada'],
        ];

        return view('admin.schedules.schedules_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$phoneNumber = new PhoneNumber;

    	$request['phone'] = $phoneNumber->stripSpecialChars($request->input('phone'));
    	$request['phone_2'] = $phoneNumber->stripSpecialChars($request->input('phone_2'));

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'phone_2' => 'nullable|numeric',
            'place' => 'required',
            'healthInsurance' => 'required',
            'date' => 'required',
            'time' => 'required',
            'observation' => 'nullable|max:400',
        ]);

        $schedule = Schedule::create([
            'name' => ucfirst($request->input('name')),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'phone_2' => $request->input('phone_2'),
            'health_insurance_id' => $request->input('healthInsurance'),
            'place_id' => $request->input('place'),
            'date' => (new DateFormatter)->BrToDefaultDate($request->input('date')),
            'time' => json_encode($request->input('time')),
            'type' => $request->input('type'),
            'observation' => $request->input('observation'),
        ]);

        return redirect()->route('agendamentos.index')->with('success', "Agendamento <strong>$schedule->name</strong> foi criado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $schedule = Schedule::findOrFail($id);

            $params = [
                'title' => 'Excluir agendamento',
                'schedule' => $schedule,
            ];

            return view('admin.schedules.schedules_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $schedule = Schedule::findOrFail($id);

            $schedule->delete();

            return redirect()->route('agendamentos.index')->with('success', "Agendamento <strong>$schedule->name</strong> foi excluído com sucesso.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}
