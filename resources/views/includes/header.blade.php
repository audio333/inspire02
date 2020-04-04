<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

	<title>@yield('title', 'My University')</title>

  <!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

  <!-- Styles -->
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>
<body>
	<div id="app">