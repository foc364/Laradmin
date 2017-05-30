<div id="contact" class="container center">
	<h3 class="text-center  wowload fadeInUp">Entre em contato</h3>
    <p class="text-center  wowload fadeInLeft"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $config->contact_email }}</p>

	@foreach ($places as $pĺace)
        <?php  $cols = ""?>
        @if ($loop->first)
            @if ($loop->count == 1)
                <?php  $cols = "col-sm-offset-3"?>
            @endif
            
            @if ($loop->count == 2)
                <?php  $cols = "col-sm-offset-3"?>
            @endif          
        @endif
        <div class="col-sm-4 {{ $cols }} contact wowload fadeInLeft">
            <p><b>{{ $pĺace->name }}</b></p>
            <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $pĺace->address }}<br />
            &nbsp;&nbsp;&nbsp;{{ $pĺace->city }}<br /><br />
            <i class="fa fa-phone-square"></i>  {{ $phoneNumber->displayPhoneFormatted($pĺace->phone) }}<br />
            @if ($pĺace->phone_2)
                <i class="fa fa-phone-square"></i>  {{ $phoneNumber->displayPhoneFormatted($pĺace->phone_2) }}
            @endif
        </div>
      
    @endforeach

</div>