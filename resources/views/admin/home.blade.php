@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Bem vindo</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                   <p>Este é o admin responsável pela manutenção e parametrização do sistema {{ env('APP_PRODUCT') }}.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop