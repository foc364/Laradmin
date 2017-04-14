<footer>
	<div class="div-local-1">
		<div class="alinhamento">
			<img class="local-1">
			<div>
				<p>{{ $placesFooter->get(0)->name }}</p>
				<p>{{ $placesFooter->get(0)->address }}</p>
				<p>Tel. {{ $phoneNumber->displayPhoneFormatted($placesFooter->get(0)->phone) }} &nbsp; 
				{{ $phoneNumber->displayPhoneFormatted($placesFooter->get(0)->phone_2) }}</p>
			</div>
		</div>
	</div>
	<div class="div-email">
		<img class="email" >
		<p>{{ $config->contact_email }}</p>
	</div>
	<div class="div-local-2">
		<div class="alinhamento">
			<img class="local-2" >
			<div>
				<p>{{ $placesFooter->get(1)->name }}</p>
				<p>{{ $placesFooter->get(1)->address }}</p>
				<p>Tel. {{ $phoneNumber->displayPhoneFormatted($placesFooter->get(1)->phone) }} &nbsp; 
				{{ $phoneNumber->displayPhoneFormatted($placesFooter->get(1)->phone_2) }}</p>
			</div>
		</div>
	</div>
</footer>