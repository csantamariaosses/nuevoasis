@extends('layouts.app')

@section('title', 'Deportes Asis')

@section('header')
    <p>Este es el header</p>
@endsection

@section('content')
  <div class="container">
    <div row="">
        <p class="h3">{{$categoriaTitulo}}</p>
    </div>
  </div>
@endsection