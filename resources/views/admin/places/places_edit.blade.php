@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $title }} <a href="{{route('consultorios.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> Voltar </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('consultorios.update', ['id' => $place->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="name">Nome <span class="required">* :</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <input type="text" maxlength="100" minlength="4" value="{{ Request::old('name') ?: $place->name }}" id="name" name="name" class="form-control" required>
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="phone">Telefone Principal :
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <input type="text" class="form-control input-medium bfh-phone" data-format=" (dd) dddd-ddddd" value="{{ Request::old('phone') ?: $place->phone }}" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone_2') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_2">Telefone Secundário :
                            </label>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <input type="text" class="form-control col-md-7 col-xs-12 input-medium bfh-phone" data-format=" (dd) dddd-ddddd" value="{{ Request::old('phone_2') ?: $place->phone_2 }}" id="phone_2" name="phone_2">
                                @if ($errors->has('phone_2'))
                                <span class="help-block">{{ $errors->first('phone_2') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="name">Cidade <span class="required"> :</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <input type="text" maxlength="40" minlength="2" value="{{ Request::old('city') ?: $place->city }}" id="city" name="city" class="form-control" >
                                @if ($errors->has('city'))
                                <span class="help-block">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="address">Endereço :
                            </label>
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <input type="text" maxlength="150" minlength="4" value="{{ Request::old('address') ?: $place->address }}" id="address" name="address" class="form-control" >
                                @if ($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="address">Ativo <i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="Se estiver 'Sim' então o consultório está funcionando e o cliente poderá agendar uma consulta nele."></i>:</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="active1" value="1" {{ $place->active ? 'checked' : ''}} > Sim
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="active2" value='0' {{ $place->active ? '' : 'checked'}}> Não
                                </label>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">{{ $title }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop