<?php

namespace Larashop\Http\Controllers\Site;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;
use Larashop\Formatters\PhoneNumber;
use Larashop\Models\Config;
use Larashop\Models\Place;
use Larashop\Models\HealthInsurance;

class ContactController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = (new config)->getSchedulesKeyValueEqual();

        $config = Config::find(1);

        $params = [
            'schedules' => $schedules,
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