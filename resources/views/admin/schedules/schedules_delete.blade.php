@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Confirmar exclusão de agendamento <a href="{{route('agendamentos.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Voltar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Tem certeza que deseja excluir o agendamento do <strong>{{ $schedule->name }}</strong></p>

                    <form method="POST" action="{{ route('agendamentos.destroy', ['id' => $schedule->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Sim, tenho certeza. Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop