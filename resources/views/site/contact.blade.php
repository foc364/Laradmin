<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

	<link href="{{asset('resources/site/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('resources/site/css/contact.css')}}" rel="stylesheet">

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
									<div class="col-sm-5">
										<div class="form-group">
									    	<input id="date" type="text" name="date" class="form-control input-sm" placeholder="Data da consulta" required="">
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
											<select name="time" class="form-control input-sm" required>
												<option value="">Horário</option>
												<option value="Santana">Santana</option>
												<option value="São Caetano">São Caetano</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-5">
										<div class="form-group">
											<select name="place" class="form-control input-sm" required>
												<option value="">Qual consultório?</option>
												<option value="Santana">Santana</option>
												<option value="São Caetano">São Caetano</option>
											</select>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="form-group">
										   	<select name="health_insurance" class="form-control input-sm" required>
												<option value="">Plano de saúde / Particular</option>
												<option value="Particular">Particular</option>
												<option value="Amil">Amil</option>
												<option value="Sul America">Sul America</option>
												<option value="Omint">Omint</option>
												<option value="Porto Seguro">Porto Seguro</option>
												<option value="Gama">Gama</option>
											</select>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-default">Enviar</button>
								<label id="msg-sucess" class="msg-sucess">Enviado com sucesso</label>
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
					<p><h2>Consultório Santana</h2></p>
					<p><h3>Tel. 2239 1670 ou 2239 1805</h3></p>
				</div>
				<div>
					<p><h2>Consultório São Caetano</h2></p>
					<p><h3>Tel. (11) 4226-1890</h3></p>
				</div>
				<div>
					<img class="email">
					<p><h3>email@email.com.b</h3></p>
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
});
</script>
