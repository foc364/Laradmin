<?php

namespace Larashop\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Larashop\Http\Controllers\Controller;
use Larashop\Models\Config;

class ConfigsAboutController extends Controller
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

            $text_about_old = $config->text_about;
       
            $params = [
                'title' => 'Configurações',
                'text_about_old' => $text_about_old,
            ];

            return view('admin.configsAbout.configsAbout_edit')->with($params);
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
          
            $config->text_about = $request->input('text_about');
            $config->save();

            return redirect()->route('configuracoes-quem-somos.edit', ['id' => 1])->with('success', "Configurações foram alteradas com sucesso.");
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
