<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Config;
use Larashop\Models\Schedule;

class ConfigsController extends Controller
{
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
            $config = Config::findOrFail($id);

            $schedules_old = json_decode($config->time, true);

            if (!$schedules_old) {
                $schedules_old = [];
            }

            $params = [
                'title' => 'Configurações',
                'schedules_old' => $schedules_old,
                'schedules' => (new Schedule)->schedules,
            ];

            return view('admin.configs.configs_edit')->with($params);
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
            $config = Config::findOrFail($id);
            $config->time = null;

            if ($request->input('schedules')) {
                $schedule =  (new Schedule)->formatScheduleKeyValueEqual($request->input('schedules'));
                $config->time = json_encode($schedule);
            }
        
            $config->save();

            return redirect()->route('configuracoes.edit', ['id' => 1])->with('success', "Configurações foram alteradas com sucesso.");
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
