<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

	<link href="{{asset('resources/site/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('resources/site/css/contact.css')}}" rel="stylesheet">

     <link href="{{asset('resources/date_picker/css/bootstrap-datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('resources/date_picker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('resources/date_picker/css/bootstrap-datepicker3.standalone.css')}}" rel="stylesheet">
    <link href="{{asset('resources/date_picker/css/bootstrap-datepicker3.standalone.min.css')}}" rel="stylesheet">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="{{asset('resources/site/js/jquery-mask-plugin/src/jquery.mask.js')}}"></script>

</head>
<body>
	
<div class="layout">
	<div class="container">
		<div class="faixa-topo"></div>
		
		<header>
			<div class="logo"></div>
		</header>

		<main>
			<div class="flex-texto-nav">

				<!-- navbar -->
				@include('site.partials.nav')
				<!-- navbar -->
				
				<div class="texto" id="style-2">
					<div>
						<p><h1>Agende uma consulta</h1></p>
						<p><h2>(Um de nossos atendentes entrará em contato com você)</h2></p>
					</div>
					
					<section class="contato">
						<div class="form-contato">
							<form method="post" action="{{ route('contato.store') }}">
								<div class="row">
									<div class="col-sm-10">
										<div class="form-group">
										    <input type="text" name="name" class="form-control input-sm" maxlength="60" placeholder="Nome" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
										    <input type="email" name="email" class="form-control input-sm" maxlength="30" placeholder="Email" required>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
									    	<input id="phone" type="text" name="phone" class="form-control input-sm" placeholder="Telefone" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5" id="sandbox-container">
			                            <div class="form-group input-group date ">
			                                <input type="text" placeholder="Data" class="form-control form-group input-sm" name="date" id="date" required>
			                            </div>
			                        </div>
									<div class="col-sm-5">
										<div class="form-group">
											 {{ Form::select('schedule', $schedules, Request::old('schedule') ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Horário', 'id' => 'schedule']) }}
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											{{ Form::select('place', $places, Request::old('place') ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Consultório', 'id' => 'place']) }}
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
									   		{{ Form::select('health_insurance', $healthInsurances, Request::old('health_insurance') ?: 'null', ['class' => 'form-control input-sm', 'placeholder' => 'Convênio / Particular']) }}
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-default">Enviar</button>
								@if (Session::has('success'))
								<label>{!! Session::get('success') !!}</label>
								@endif
								<input type="hidden" name="_token" value="{{ Session::token() }}">
							</form>
						</div>
					</section>

				</div>
			</div>

			<div class="flex-foto">
				<h1>Contato</h1>
				<div>
					<img class="tel">
					<p><h2>Consultório {{ $placesFooter->get(0)->name }}</h2></p>
					<p><h3>Tel. {{ $phoneNumber->displayPhoneFormatted($placesFooter->get(0)->phone) }} &nbsp; 
				{{ $phoneNumber->displayPhoneFormatted($placesFooter->get(0)->phone_2) }}</h3></p>
				</div>
				<div>
					<p><h2>Consultório {{ $placesFooter->get(1)->name }}</h2></p>
					<p><h3>Tel. {{ $phoneNumber->displayPhoneFormatted($placesFooter->get(1)->phone) }} &nbsp; 
					{{ $phoneNumber->displayPhoneFormatted($placesFooter->get(1)->phone_2) }}</h3></p>
				</div>
				<div>
					<img class="email">
					<p><h3>{{ $config->contact_email}}</h3></p>
				</div>
			</div>
		</main>

		<!-- footer -->
		@include('site.partials.footer')
		<!-- footer -->

	</div>
</div>
</body>
</html>

<script src="{{asset('resources/date_picker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('resources/date_picker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('resources/date_picker/js/bootstrap-datepicker.pt-BR.min.js')}}"></script>

<script>
$(document).ready(function(){
	var maskBehavior = function (val) {
	 return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	options = {onKeyPress: function(val, e, field, options) {
	 field.mask(maskBehavior.apply({}, arguments), options);
	 }
	};

	$('#phone').mask(maskBehavior, options);
	$('#date').mask('00/00/0000');

	$('#sandbox-container input').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            daysOfWeekDisabled: "0,6",
            startDate: "07/04/2017",
            endDate: "07/05/2017",
            todayHighlight: true,
            autoclose: true,
    });
});


$( "#place" ).change(function() {
	$.ajax({
	    type: 'GET',
	    data: {
	      date: $('#date').val()
	    },
	    url: 'request-schedules-available',
	    dataType: 'json',
	    success: function (data) {
	    	$('#schedule').html(data);

	        console.log(data);
	     
	    },
	    error: function (data) {
	        console.log('Error:', data);
	    }
	});
});


</script>
