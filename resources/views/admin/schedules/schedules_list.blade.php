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
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Paciente</th>
                                <th>Telefone</th>
                                <th>Telefone Secundário</th>
                                <th>E-mail</th>
                                <th>Horário</th>
                                <th>Consultório</th>
                                <th>Convênio</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Paciente</th>
                                <th>Telefone</th>
                                <th>Telefone Secundário</th>
                                <th>E-mail</th>
                                <th>Horário</th>
                                <th>Consultório</th>
                                <th>Convênio</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($schedules))
                            @foreach($schedules as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->phone_2}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->data}}</td>
                                <td>{{$row->place_id}}</td>
                                <td>{{$row->health_insurance_id}}</td>
                                <td>
                                    <a href="{{ route('agendamentos.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Alterar"></i> </a>
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
@stop