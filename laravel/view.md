create layout:

@include('includes.header')

@yield('content')
@yield('form')

@include('includes.footer')

----------------------------------------------


Other pages extending layout:

@extends('layout')

@section('content')
<!-- content -->
@stop