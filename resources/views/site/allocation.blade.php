<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

    <link href="{{asset('resources/site/css/allocation.css')}}" rel="stylesheet">
</head>
<body>
	
<div class="layout">
	<div class="container">
		<div class="faixa-topo"></div>
		
		<header>
			<div class="logo"></div>
		</header>

		<main>
			<!-- navbar -->
			@include('site.partials.nav')
			<!-- navbar -->
			
			<div class="flex-foto">
				<div class="desc-texto">
					<p><h1>Consultório Santana</h1></p>
					<p><h2>Rua Voluntários da Pátria, 654, cj 807 - Santana</h2></p>
					<p><h2>São Paulo - SP</h2></p>
					<p><h2>(Próximo ao Metrô Portuguesa-Tietê)</h2></p>
				</div>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3054.280746076794!2d-46.6278637533847!3d-23.514779237126003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5885c857710b%3A0x543d452435ff1825!2sR.+Volunt%C3%A1rios+da+P%C3%A1tria%2C+654+-+807+-+Santana%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1486173634461"  frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="flex-texto-nav">
				<div class="texto">
					<div class="desc-texto">
						<p><h1>Consultório São Caetano</h1></p>
						<p><h2>Avenida Senador Roberto Simonsen, 832- Ceramica</h2></p>
						<p><h2>São Caetano Do Sul - SP</h2></p>
					</div>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.549072201206!2d-46.577399185000914!3d-23.6204996846535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5c94dff18b25%3A0xddb7518089b2d51c!2sAv.+Sen.+Roberto+S%C3%ADmonsen%2C+832+-+Santo+Ant%C3%B4nio%2C+S%C3%A3o+Caetano+do+Sul+-+SP%2C+09530-401!5e0!3m2!1spt-BR!2sbr!4v1486174387291"  frameborder="0" style="border:0" allowfullscreen></iframe>
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