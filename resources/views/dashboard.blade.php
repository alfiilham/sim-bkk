@extends('layouts.header')
@section('dashboard','m-menu__item--active')
@section('content')
@if(auth::user()->role == 'admin')
@section('title','SIMBKK | Dashboard Admin')
@include('admin.dashboard')
@elseif(auth::user()->role == 'instansi')
@section('title','SIMBKK | Dashboard Instansi')
@include('instansi.dashboard')
@else
@section('title','SIMBKK | Dashboard Alumni')
@include('user.dashboard')
@endif
@include('layouts.footer')
@endsection


