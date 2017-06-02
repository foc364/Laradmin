@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Convênios <a href="{{route('convenios.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Criar novo </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Convênio</th>
                                <th>Ativo <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Se estiver 'Sim' então o convênio está ativo e o cliente poderá agendar uma consulta usando ele."></i></th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Convênio</th>
                                <th>Ativo</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if (count($healthInsurances))
                            @foreach($healthInsurances as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->active ? 'Sim' :'Não'}}</td>
                                <td>
                                    <a href="{{ route('convenios.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs" ><i class="fa fa-pencil" title="Alterar"></i> </a>
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