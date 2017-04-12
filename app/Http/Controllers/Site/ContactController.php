<?php

namespace Larashop\Http\Controllers\Site;

use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;
use Snowfire\Beautymail\Beautymail;

class ContactController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beautymail = app()->make(Beautymail::class);

        $beautymail->send('emails.welcome', [], function($message) {

        $message
            ->from('contato@preseme.com.br')
            ->to('foc364@gmail.com', 'John Smith')
            ->subject('Welcome!');
        });

        return view('site.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //$beautymail = new Beautymail(app()->make(Beautymail::class));

       

       

        return redirect()->route('contato')->with('success', "The brand <strong>$brand->name</strong> has successfully been created.");
    }
}