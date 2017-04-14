<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\HealthInsurance;

class HealthInsurancesController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $healthInsurances = HealthInsurance::orderBy('name')->get();

        $params = [
        	'title' => 'Lista de convênios',
        	'healthInsurances' => $healthInsurances,
        ];

        return view('admin.healthInsurances.healthInsurance_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Criar Convênio',
        ];

        return view('admin.healthInsurances.healthInsurance_create')->with($params);
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
        ]);

        $healthInsurances = HealthInsurance::create([
            'name' => ucfirst($request->input('name')),
        ]);

        return redirect()->route('convenios.index')->with('success', "Convênio <strong>$healthInsurances->name</strong> foi criado com sucesso.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $healthInsurance = HealthInsurance::findOrFail($id);
            $params = [
                'title' => 'Alterar Convênio',
                'healthInsurance' => $healthInsurance,
            ];

            return view('admin.healthInsurances.healthInsurance_edit')->with($params);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
        	$this->validate($request, [
	            'name' => 'required|max:100',
	        ]);

            $healthInsurance = HealthInsurance::findOrFail($id);

            $healthInsurance->name = ucfirst($request->input('name'));
            $healthInsurance->active = $request->input('active');
            $healthInsurance->save();

            return redirect()->route('convenios.index')->with('success', "Convênio <strong>$healthInsurance->name</strong> foi alterado com sucesso.");
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
