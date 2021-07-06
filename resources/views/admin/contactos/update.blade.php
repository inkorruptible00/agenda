@extends('adminlte::page')

@section('css')
   
@stop




@section('js')

    
@stop


@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Usuarios.</p>

    {{$contacto}}

    <form name="add" id="add" method="POST" action="{{route('contactos.update',$contacto)}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        

        <p>
        <p> 
        <input type="submit" value="Submit">
    
    </form>


@stop




