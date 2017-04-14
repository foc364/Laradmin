<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

    <link href="{{asset('resources/site/css/orientation.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="resources/site/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" />	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="resources/site/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
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
					<p><h1>Orientações aos paciente</h1></p>
					<h2><?php print $config->text_orientation ?></h2>
				</div>
			</div>

			<div class="flex-foto">
				<img class="galeria-1-mini">
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
    (function($){
        $(window).on("load",function(){
            $(".texto").mCustomScrollbar({
			    theme:"light"
			});
        });
    })(jQuery);
</script>