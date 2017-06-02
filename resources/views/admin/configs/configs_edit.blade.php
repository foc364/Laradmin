@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $title }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('configuracoes.update', ['id' => 1]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-4 col-xs-12" for="name">Horários de Atendimento <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Horário em que o médico trabalha."></i>:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @foreach ($schedules as $schedule)
                                <label class="checkbox-inline">
                                  {{ Form::checkbox('schedules[]', $schedule, in_array($schedule, $schedules_old)) }} {{ $schedule }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">Alterar {{ $title }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop