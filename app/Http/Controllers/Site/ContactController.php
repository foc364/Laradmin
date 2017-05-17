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

class ContactController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $schedules = (new Schedule)->schedulesAvailableByDate($request->input('date'));

        $config = Config::find(1);

        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'place' => $request->input('place'),
            'date' => $request->input('date'),
            'health_insurance' => $request->input('health_insurance'),
            'schedule' => $request->input('schedule'),
            'schedules' => (!empty($schedules) ? (new Schedule)->formatScheduleKeyValueEqual($schedules) : ['' => 'Agenda Lotada']),
            'places' => Place::pluck('name', 'name'),
            'healthInsurances' => HealthInsurance::pluck('name', 'name'),
            'config' => $config,
            'phoneNumber' => new PhoneNumber,
            'placesFooter' => Place::all(),
        ];

        return view('site.contact')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('contato.index')->with('success', "E-mail enviado com sucesso.");
    }
}