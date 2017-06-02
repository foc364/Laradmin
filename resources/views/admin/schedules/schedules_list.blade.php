@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agendamentos <a href="{{route('agendamentos.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Criar novo </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" id="sandbox-container">
                    <form method="get" action="{{ route('agendamentos.index') }}" data-parsley-validate class="form-horizontal form-label-left" name="filter" id="filter">
                        <label>Data da consulta</label>
                        <div class="input-group date col-md-3 col-sm-3 col-xs-8" >
                            <span class="input-group-addon" ><i class="glyphicon glyphicon-calendar"></i></span>
                            <input type="text" name="date" class="form-control form-group" value="{{ Request::input('date') ?: Carbon::now()->format('d/m/Y') }}">
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>

                 
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Tipo <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Colocar 'Reservado' quando for para ocupar o horario com qualquer coisa menos consulta ex. Sair mais cedo, compromisso etc.."</th>
                                <th>Telefone Principal</th>
                                <th>Telefone Secundário</th>
                                <th>E-mail</th>
                                <th>Horário</th>
                                <th>Consultório</th>
                                <th>Convênio</th>
                                <th>Observação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Paciente</th>
                                <th>Tipo</th>
                                <th>Telefone Principal</th>
                                <th>Telefone Secundário</th>
                                <th>E-mail</th>
                                <th>Horário</th>
                                <th>Consultório</th>
                                <th>Convênio</th>
                                <th>Observação</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($schedules))
                            @foreach($schedules as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>@lang('enums.'.$row->type)</td>
                                <td>{{$phoneNumber->displayPhoneFormatted($row->phone)}}</td>
                                <td>{{$phoneNumber->displayPhoneFormatted($row->phone_2)}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{str_replace(['"', '[', ']', ','], ['', '', '', ', '], $row->time)}}</td>
                                <td>{{$places->get($row->place_id)}}</td>
                                <td>{{$healthInsurances->get($row->health_insurance_id)}}</td>
                                <td>{{$row->observation}}</td>
                                <td>
                                    <a href="{{ route('agendamentos.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Excluir"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
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
        todayHighlight: true,
        autoclose: true,
    });

    $('#sandbox-container .input-group.date').datepicker().on('changeDate', function(e) {
       $('#filter').submit();
    });
     
 
});
</script>
@stop