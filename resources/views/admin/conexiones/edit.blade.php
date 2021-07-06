@extends('adminlte::page')

@section('css')
   
@stop




@section('js')

    
@stop


@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Conexión</h1>
@stop

@section('content')

    <form name="add" id="add" method="POST" action="{{route('conexiones.update',$conexion)}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <label for="fname">Conexión Id:</label><br>
        <input type="text" id="id" name="id" value="{{$conexion->id}}"><br>

        <label for="fname">Contacto Id:</label><br>
        <input type="text" id="contacto_id" name="contacto_id" value="{{$conexion->contacto_id}}"><br>
      
        <label for="fname">Fecha Conexión:</label><br>
        <input type="text" id="fecha_conexion" name="fecha_conexion" value="{{$conexion->fecha_conexion}}"><br>

        <label for="fname">Próxima Conexión:</label><br>
        <input type="text" id="proxima_conexion" name="proxima_conexion" value="{{$conexion->proxima_conexion}}"><br>

        <label for="lname">Campo memo:</label><br>
        <textarea id="memo_conexion" name="memo_conexion" cols="70" rows="10">{{$conexion->memo_conexion}}</textarea><br>


        <p>
        <p> 
   
        <button type="submit" class="btn btn-primary">Guardar Modificación</button>
    
    </form>


@stop




