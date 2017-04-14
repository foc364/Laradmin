@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ $title }} da página inicial</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('configuracoes-home.update', ['id' => 1]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('schedules') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="schedules"><p>Texto da página inicial :</p>
                                <samp>
                                    <p>Usar as tags {{ '<p>' }} e {{ '</p>' }} para quebra de linha</p>
                                </samp>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             {!! Form::textarea('text_home', Request::old('text_home') ?: $text_home_old , ['id' => 'text_home', 'rows' => 15, 'cols' => 54, 'style' => 'resize:yes', 'class'=>'form-control']) !!}
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