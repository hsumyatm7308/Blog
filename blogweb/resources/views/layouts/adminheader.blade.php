<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Every Day In Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		{{-- tailwind  --}}
		<script src="https://cdn.tailwindcss.com"></script>

		{{-- boostrap  --}}
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- jqueryui css1 js1 -->
		<link href="{{asset('./assets/libs/jquery-ui-1.13.2.custom/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />

        {{-- custom css  --}}
		<link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />

		{{-- extra css --}}
		@yield('css')
	</head>
    <body class="is-preload">

 