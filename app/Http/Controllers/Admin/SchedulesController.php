<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Schedule;
use Larashop\Models\Place;
use Larashop\Models\HealthInsurance;

class SchedulesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        $params = [
            'title' => 'Lista de agendamentos',
            'schedules' => $schedules,
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

        $params = [
            'title' => 'Criar Agendamento',
            'places' => Place::where('active', 1)->pluck('name', 'id'),
            'healthInsurances' => HealthInsurance::where('active', 1)->pluck('name', 'id'),
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
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_num|max:10',
        ]);

        $user = User::create([
            'name' => ucfirst($request->input('name')),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('usuarios.index')->with('success', "Usuário <strong>$user->name</strong> foi criado com sucesso.");
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
            $user = User::findOrFail($id);

            $params = [
                'title' => 'Excluir usuário',
                'user' => $user,
            ];

            return view('admin.users.users_delete')->with($params);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $params = [
                'title' => 'Alterar Usuário',
                'user' => $user,
            ];

            return view('admin.users.users_edit')->with($params);
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
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required|email|unique:users,id,'.$id,
            ]);

            $user->name = ucfirst($request->input('name'));
            $user->email = $request->input('email');
            $user->save();

            return redirect()->route('usuarios.index')->with('success', "Usuário <strong>$user->name</strong> foi alterado com sucesso.");
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
            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->route('usuarios.index')->with('success', "Usuário <strong>$user->name</strong> foi excluído com sucesso.");
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
