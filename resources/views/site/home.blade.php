<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Preseme</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link rel="stylesheet" href="resources/bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- bootstrap -->
<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="resources/site/animate/animate.css" />
<link rel="stylesheet" href="resources/site/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="resources/site/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="resources/site/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="resources/site/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="resources/site/style.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header -->
@include('site.partials.header')

<!-- Home -->
@include('site.sections.home')

<!-- About -->
@include('site.sections.about')

<!-- Orientation -->
@include('site.sections.orientation')

<!-- Schedule -->
@include('site.sections.appointment')

<!-- Footer -->
@include('site.partials.footer')


<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>

<!-- jquery -->
<script src="resources/site/jquery.js"></script>

<!-- wow script -->
<script src="resources/site/wow/wow.min.js"></script>

<!-- boostrap -->
<script src="resources/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="resources/site/mobile/touchSwipe.min.js"></script>
<script src="resources/site/respond/respond.js"></script>

<!-- gallery -->
<script src="resources/site/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="resources/site/script.js"></script>


<!-- mask -->
<script src="resources/site/js/jquery-mask-plugin/src/jquery.mask.js"></script>

<script>
$(document).ready(function(){
  var maskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  },
    options = {onKeyPress: function(val, e, field, options) {
      field.mask(maskBehavior.apply({}, arguments), options);
    }
  };

  $('.phone').mask(maskBehavior, options);
  
  $('#form_contact').submit(function( event ) {
    var parameters = {
      action: 'sendEmail',
      form: $('#form_contact').serializeArray()
    };

    $.ajax({
        type: 'POST',
        url: 'site-requests',
        data: parameters,
        dataType: 'json',
        success: function (data) {
          $('#msg_email').html(data).fadeIn('slow');
          $("#form_contact")[0].reset();
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });

    event.preventDefault();
  });
});
</script>

</body>
</html>