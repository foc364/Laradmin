@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $title }} do E-mail de contato</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('configuracoes-contato.update', ['id' => 1]) }}" data-parsley-validate class="form-horizontal form-label-left">

                       <div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12" for="contact_email">E-mail <span class="required"><i class="glyphicon glyphicon-question-sign"  data-toggle="tooltip" data-placement="top" title="E-mail pelo qual os clientes vão entrar em contato."></i> * :</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="email" value="{{ Request::old('contact_email') ?: $config->contact_email }}" id="contact_email" name="contact_email" class="form-control" required>
                                @if ($errors->has('contact_email'))
                                <span class="help-block">{{ $errors->first('contact_email') }}</span>
                                @endif
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