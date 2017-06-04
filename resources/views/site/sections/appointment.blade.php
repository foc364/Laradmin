<div id="appointment" class="spacer">

  <div class="container appointmentform center">
    <h2 class="text-center  wowload fadeInUp">Agende sua consulta agora mesmo</h2>
    <p class="text-center  wowload fadeInLeft">Aguarde nosso contato para a confirmação da consulta</p>

    <div id="div_email" class="col-sm-6 col-sm-offset-5">
       <span id="msg_email"></span>
    </div>
    
    <form method="post" action="{{ Request::route('site-requests') }}" id="form_contact">


      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input id="name" type="text" name="name" class="form-control input-sm" placeholder="Nome" value="{{ $request->name ?: '' }}" required >
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" class="form-control input-sm" maxlength="30" placeholder="Email" value="{{ $request->email ?: '' }}" required>
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="text" name="phone" class="phone form-control input-sm" placeholder="Telefone Fixo" value="{{ $request->phone ?: '' }}">
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12">    
          <div class="form-group{{ $errors->has('cel') ? ' has-error' : '' }}">
            <input id="cellphone" type="text" name="cellphone" class="phone form-control input-sm" placeholder="Celular" value="{{ $request->cellphone ?: '' }}" >
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
            <input id="whatsapp" type="text" name="whatsapp" class="phone form-control input-sm" placeholder="WhatsApp" value="{{ $request->whatsapp ?: '' }}"  >
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
            {{ Form::select('place', $places->pluck('name', 'name'), $request->place ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Consultório', 'id' => 'place' , 'required' => 'required']) }}
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('health_insurance') ? ' has-error' : '' }}">
            {{ Form::select('health_insurance', $healthInsurances, $request->health_insurance ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Convênio / Particular', 'id' => 'health_insurance', 'required' => 'required'] )}}
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-6 col-sm-offset-3 col-xs-12" id="sandbox-container">      
              <button type="submit" id="btn_submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Agendar</button>

        </div>
      </div>


      @if (Session::has('success'))
      <label>{!! Session::get('success') !!}</label>
      @endif
      <input type="hidden" name="_token" value="{{ Session::token() }}">

    </form>

    @include('site.sections.contact')

  </div>
</div>
