<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
  	<link rel="stylesheet" href="{{ asset('bower_resources/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  	<link rel="stylesheet" type="text/css" href="{{ asset('bower_resources/font-awesome/css/font-awesome.min.css') }}">

    <style type="text/css">
     .panel-container{
        margin-top: 76px;
     } 
     tr
     {
      text-align: center;
     }
     th
     {
      text-align: center;
     }
     .table > tbody > tr > td
     {
      vertical-align: middle;
     }
    </style>
	@yield('styles')
  <link href="https://fonts.googleapis.com/css?family=Alegreya|BenchNine|Courgette|Domine|Dosis|Quicksand" rel="stylesheet"> 

	<title>Stephanie Access</title>
</head>
<body>
	@section('header')
		@include('partials.header')
	@show

	@yield('content')

	@section('footer')
		@include('partials.footer')
	@show

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('bower_resources/moment/min/moment.min.js') }}"></script>
  	<script type="text/javascript" src="{{ asset('bower_resources/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    @yield('scripts')
</body>
</html>