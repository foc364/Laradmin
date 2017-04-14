<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

    <link href="{{asset('resources/site/css/home.css')}}" rel="stylesheet">
</head>
<body>
	
<div class="layout">
	<div class="container">
		<header>
			<div class="logo"></div>
		</header>

		<main>
			<div class="flex-texto-nav">

				<!-- navbar -->
				@include('site.partials.nav')
				<!-- navbar -->

				<div class="texto">
					<p><h1>Seja bem vindo</h1></p>
					<h2> <?php print $config->text_home ?></h2>
				</div>
			</div>

			<div class="flex-foto">
				<div class="foto"></div>
			</div>
		</main>

		<!-- footer -->
		@include('site.partials.footer')
		<!-- footer -->
		
	</div>
</div>

</body>
</html>