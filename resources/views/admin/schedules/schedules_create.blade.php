@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $title }} <a href="{{route('agendamentos.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Voltar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('agendamentos.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="places">Tipo <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Colocar 'Reservado' quando for para ocupar o horario com qualquer coisa menos consulta ex. Sair mais cedo, compromisso etc.."></i>:</span></label>
                            
                            <div class="col-md-3 col-sm-4 col-xs-12">
                               {{ Form::select('type', Config::get('enums.schedules.type'), Request::old('type') ?: 'null', ['class' => 'form-control', 'id' => 'type']) }}
                                @if ($errors->has('type'))
                                <span class="help-block">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Paciente <span class="required">* :</span>
                            </label>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <input type="text" maxlength="100" minlength="4" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control" required>
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Telefone <span class="required">* :</span>
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-10">
                                <input type="text" class="form-control input-medium bfh-phone" data-format=" (dd) dddd-ddddd" value="{{ Request::old('phone') ?: '' }}" id="phone" name="phone" required>
                                @if ($errors->has('phone'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_2') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_2">Telefone Secundário :
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-10">
                                <input type="text" class="form-control col-md-7 col-xs-12 input-medium bfh-phone" data-format=" (dd) dddd-ddddd" value="{{ Request::old('phone_2') ?: '' }}" id="phone_2" name="phone_2">
                                @if ($errors->has('phone_2'))
                                <span class="help-block">{{ $errors->first('phone_2') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-mail :
                            </label>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <input type="email" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control">
                                @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="places">Consultório <span class="required">* :</span></label>
                            
                            <div class="col-md-3 col-sm-4 col-xs-12">
                               {{ Form::select('place', $places, Request::old('place') ?: 'null', ['class' => 'form-control', 'placeholder' => 'Selecione..']) }}
                                @if ($errors->has('place'))
                                <span class="help-block">{{ $errors->first('place') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('healthInsurance') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healthInsurance">Convênio: <span class="required">* :</span>
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                               {{ Form::select('healthInsurance', $healthInsurances, Request::old('healthInsurance') ?: 'null', ['class' => 'form-control', 'placeholder' => 'Selecione..']) }}
                                @if ($errors->has('healthInsurance'))
                                <span class="help-block">{{ $errors->first('healthInsurance') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}" id="sandbox-container">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Data <span class="required">* :</span>
                            </label>
                            <div class="input-group date col-md-2 col-sm-2 col-xs-10">
                                <span class="input-group-addon" ><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="text" class="form-control form-group" name="date" id="date" value="{{ Request::old('date') ?: Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->format('d/m/Y') }}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="time">Horário: <span class="required">* :</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                               {{ Form::select('time[]', $time, Request::old('time') ?: 'null', ['class' => 'form-control', 'id' => 'time', 'multiple' => 'multiple']) }}
                                @if ($errors->has('time'))
                                <span class="help-block">{{ $errors->first('time') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observation') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Observação <span class="required">:</span>
                            </label>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                 {!! Form::textarea('observation', Request::old('observation') ?: '' , ['id' => 'observation', 'rows' => 4, 'cols' => 54, 'style' => 'resize:yes', 'class'=>'form-control']) !!}
                                @if ($errors->has('observation'))
                                <span class="help-block">{{ $errors->first('observation') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">{{ $title }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#sandbox-container .input-group.date').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            daysOfWeekDisabled: "0,6",
            todayHighlight: true,
            autoclose: true,
        });

        /***** Quando troca a data ******/
        $('#sandbox-container .input-group.date').datepicker().on('changeDate', function(e) {
            var parameters = {
              action: 'getAvailableSchedule',
              date: $('#date').val()
            };

            $.ajax({
              type: 'POST',
              url: '../../admin-requests',
              data: parameters,
              dataType: 'json',
              success: function (data) {
                $('#time').multiselect('rebuild');
                $('#time').empty().append(data);
                $('#time').multiselect('rebuild');

              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
        });
        /***** Quando troca a data ******/

        $('#time').multiselect({
            maxHeight: 200,
            nonSelectedText: 'Selecione..',
            nSelectedText: ' - Selecionados'
        });

        var parameters = {
          action: 'getAvailableSchedule',
          date: $('#date').val()
        };

        $.ajax({
          type: 'POST',
          url: '../../admin-requests',
          data: parameters,
          dataType: 'json',
          success: function (data) {
            $('#time').multiselect('rebuild');
            $('#time').empty().append(data);
            $('#time').multiselect('rebuild');

          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
         
    });
</script>
@stop