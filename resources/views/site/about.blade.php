<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dr. Irineu Blanco Moreno</title>

    <link href="{{asset('resources/site/css/about.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css" />	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
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
					<p><h1>Quem somos</h1></p>
					<p><h2>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempus consectetur risus tincidunt aliquam. Sed mattis ligula bibendum quam consequat, vel dapibus purus mattis. Curabitur posuere massa ut nibh volutpat dapibus. Vestibulum condimentum nulla sed porttitor varius. Mauris eget dolor justo. Quisque et purus arcu. Nam tristique nunc ac felis euismod porttitor. In in pharetra ligula. Morbi non hendrerit libero. Nulla a fringilla erat, sed aliquam diam.
					</h2></p>
					<p><h2>
					Curabitur aliquam lectus efficitur erat laoreet faucibus. Ut ornare, libero ut ornare auctor, arcu sapien gravida dolor, in ultrices lorem lorem a urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at neque luctus dui tristique mattis sit amet quis mauris. Vivamus leo nunc, vehicula vitae hendrerit viverra, faucibus non purus. Curabitur sed eros dictum, pellentesque augue nec, porta felis. Nunc non tincidunt nisl.
					</h2></p>
				</div>
			</div>

			<div class="flex-foto">
				<img class="galeria">
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