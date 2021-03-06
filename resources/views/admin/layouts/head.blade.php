<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Innovative Resource Platform" />
<meta name="author" content="iMedical" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}"/>
<!-- CSS & JS Library -->
<link href="{{ URL::asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/plugins/bootstrap/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="{{ URL::asset('/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/sb-admin.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/plugins/owl/owl.theme.default.min.css') }}" rel="stylesheet">
{{-- <link href="{{ URL::asset('/plugins/morris/morris.css') }}" rel="stylesheet"> --}}

<!-- LOADING FONTS AND ICONS -->
{{-- <link href="http://fonts.googleapis.com/css?family=Fredoka+One:400%7CPoppins:500%2C400%2C700" rel="stylesheet" property="stylesheet" type="text/css" media="all"> --}}


<!-- STYLE -->
{{-- <link href="{{ URL::asset('/css/global-style-admin.css') }}" rel="stylesheet"> --}}
<link href="{{ URL::asset('/css/main-style.css') }}" rel="stylesheet">
{{--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{ URL::asset('/plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
