@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Consultórios <a href="{{route('consultorios.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Criar novo </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ativo <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Se estiver 'Sim' então o consultório está funcionando e o cliente poderá agendar uma consulta nele."></i></th>
                                <th>Cidade</th>
                                <th>Endereço</th>
                                <th>Telefone Principal</th>
                                <th>Telefone Secundário</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Ativo</th>
                                <th>Cidade</th>
                                <th>Endereço</th>
                                <th>Telefone Principal</th>
                                <th>Telefone Secundário</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($places))
                            @foreach($places as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->active ? 'Sim' :'Não'}}</td>
                                <td>{{$row->city}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$phoneNumber->displayPhoneFormatted($row->phone)}}</td>
                                <td>{{$phoneNumber->displayPhoneFormatted($row->phone_2)}}</td>
                                <td>
                                    <a href="{{ route('consultorios.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Alterar"></i> </a>
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