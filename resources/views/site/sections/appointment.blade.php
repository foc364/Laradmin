<div id="appointment" class="spacer">

  <div class="container appointmentform center">
    <h2 class="text-center  wowload fadeInUp">Agende sua consulta agora mesmo</h2>
    <form method="post" action="" id="form_contact">


      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-6 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input id="name" type="text" name="name" class="form-control input-sm" placeholder="Nome" value="{{ $name ?: '' }}" required >
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" class="form-control input-sm" maxlength="30" placeholder="Email" value="{{ $email ?: '' }}" required>
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <input id="phone" type="text" name="phone" class="form-control input-sm" placeholder="Telefone" value="{{ $phone ?: '' }}" required >
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12">      
          <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
            {{ Form::select('place', $places, $place ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Consultório', 'id' => 'place' , 'required' => 'required']) }}
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('health_insurance') ? ' has-error' : '' }}">
            {{ Form::select('health_insurance', $healthInsurances, $health_insurance ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Convênio / Particular', 'disabled' => 'disabled', 'id' => 'health_insurance', 'required' => 'required'] )}}
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-3 col-sm-offset-3 col-xs-12" id="sandbox-container">      
          <div class="form-group input-group date">
            <input type="text" placeholder="Data" class="form-control form-group input-sm" name="date" id="date" value="{{ $date ?: 'null' }}" required disabled>
          </div>
        </div>
        <div class="col-sm-3  col-xs-12">      
          <div class="form-group{{ $errors->has('schedule') ? ' has-error' : '' }}">
             {{ Form::select('schedule', $schedules, $schedule ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Horário', 'id' => 'schedule', 'disabled' => 'disabled', 'required' => 'required']) }}
          </div>
        </div>
      </div>

      <div class="row wowload fadeInLeftBig">  
        <div class="col-sm-6 col-sm-offset-3 col-xs-12" id="sandbox-container">      
              <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Agendar</button>

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
