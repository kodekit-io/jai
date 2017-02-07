<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        @if(isset($metaDesc))<meta name="description" content="{!! $metaDesc !!}">@endif

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Jakarta Aquarium @if(isset($pageTitle)) - {!! $pageTitle !!} @endif </title>

		<!-- Homescreen Icons -->
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="192x192" href="{!! asset('frontend/img/favicons/android-chrome-192x192.png') !!}">

		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Jakarta Aquarium">
		<link rel="apple-touch-icon-precomposed" href="{!! asset('frontend/img/favicons/apple-touch-icon-precomposed.png') !!}">
		<link rel="apple-touch-icon" sizes="180x180" href="{!! asset('frontend/img/favicons/apple-touch-icon.png') !!}">

		<link rel="icon" type="image/png" href="{!! asset('frontend/img/favicons/favicon-32x32.png') !!}" sizes="32x32">
		<link rel="icon" type="image/png" href="{!! asset('frontend/img/favicons/favicon-16x16.png') !!}" sizes="16x16">
		<link rel="shortcut icon" href="{!! asset('frontend/img/favicons/favicon.ico') !!}">

		<link rel="manifest" href="{!! asset('frontend/img/favicons/manifest.json') !!}">
		<link rel="mask-icon" href="{!! asset('frontend/img/favicons/safari-pinned-tab.svg') !!}" color="#005da6">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" href="{!! asset('frontend/css/main.css') !!}">
		@section('page-level-styles')
		@show

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
