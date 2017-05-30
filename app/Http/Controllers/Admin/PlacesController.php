<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Place;
use Larashop\Formatters\PhoneNumber;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();

        $params = [
        	'title' => 'Lista de consultórios',
        	'places' => $places,
        ];

        return view('admin.places.places_list')
        		->with($params)
        		->with('phoneNumber', new PhoneNumber);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Criar Consultório',
        ];

        return view('admin.places.places_create')->with($params);
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
            'phone' => 'nullable|numeric',
            'phone_2' => 'nullable|numeric',
            'city' => 'nullable|max:40',
        ]);

        $place = Place::create([
            'name' => ucfirst($request->input('name')),
            'phone' => $request->input('phone'),
            'phone_2' => $request->input('phone_2'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
        ]);

        return redirect()->route('consultorios.index')->with('success', "Consultório <strong>$place->name</strong> foi criado com sucesso.");
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
            $place = Place::findOrFail($id);
            $params = [
                'title' => 'Alterar Consultório',
                'place' => $place,
            ];

            return view('admin.places.places_edit')->with($params);
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
        	$phoneNumber = new PhoneNumber;

	    	$request['phone'] = $phoneNumber->stripSpecialChars($request->input('phone'));
	    	$request['phone_2'] = $phoneNumber->stripSpecialChars($request->input('phone_2'));

        	$this->validate($request, [
	            'name' => 'required|max:100',
                'phone' => 'nullable|numeric',
                'phone_2' => 'nullable|numeric',
                'city' => 'nullable|max:40',
	        ]);

            $place = Place::findOrFail($id);

            $place->name = ucfirst($request->input('name'));
            $place->phone = $request->input('phone');
            $place->phone_2 = $request->input('phone_2');
            $place->address = $request->input('address');
            $place->active = $request->input('active');
            $place->city = $request->input('city');
            $place->save();

            return redirect()->route('consultorios.index')->with('success', "Consultório <strong>$place->name</strong> foi alterado com sucesso.");
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
