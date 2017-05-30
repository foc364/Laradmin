<?php

namespace Larashop\Http\Controllers\Site;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;
use Larashop\Formatters\PhoneNumber;
use Larashop\Models\Config;
use Larashop\Models\Place;
use Larashop\Models\HealthInsurance;
use Larashop\Models\Schedule;
use Response;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = (new Schedule)->getSchedulesAvailableByDate($request->input('date'));

        $config = Config::find(1);
     
        $params = [
            'request' => $request,
            'schedules' => (!empty($schedules) ? (new Schedule)->formatScheduleKeyValueEqual($schedules) : ['' => 'Agenda Lotada']),
            'healthInsurances' => HealthInsurance::pluck('name', 'name'),
            'config' => $config,
            'phoneNumber' => new PhoneNumber,
            'places' => Place::where('active', 1)->get(),
        ];

        return view('site.home')->with($params);
    }

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

    public function sendEmail(Request $request) 
    {
        foreach ($request->form as $fields) {
            $request->request->add([ $fields['name'] => $fields['value'] ]);
        }

        $request->request->remove('action');
        $request->request->remove('form');

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'email',
            'phone' => 'required',
            'date' => 'required',
            'place' => 'required',
            'health_insurance' => 'required',
            'schedule' => 'required',
        ]);

        $beautymail = app()->make(Beautymail::class);

        $beautymail->send('emails.welcome', $request->all(), function($message) {

        $message
            ->from('site@preseme.com.br')
            ->to('contato@preseme.com.br', 'John Smith')
            ->subject('Agendamento de consulta');
        });

        return Response::json("Enviado com sucesso");

    }
}