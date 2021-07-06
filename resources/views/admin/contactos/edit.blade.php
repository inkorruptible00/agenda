@extends('adminlte::page')

@section('css')
   
@stop




@section('js')

    
@stop


@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

    <form name="add" id="add" method="POST" action="{{route('contactos.update',$contacto)}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <label for="fname">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{$contacto->nombre}}"><br>

        <label for="lname">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" value="{{$contacto->email}}"><br>
      
        <label for="lname">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="{{$contacto->telefono}}"><br>

        <label for="lname">Horario contacto:</label><br>
        <input type="text" id="horario_contacto" name="horario_contacto" value="{{$contacto->horario_contacto}}"><br>

        <label for="lname">Próxima conexión:</label><br>
        <input type="text" id="proxima_conexion" name="proxima_conexion" value="{{$contacto->proxima_conexion}}"><br>

        <label for="lname">Campo memo:</label><br>
        <textarea id="campo_memo" name="campo_memo" cols="70" rows="10">{{$contacto->campo_memo}}</textarea><br>


        <p>
        <p> 
   
        <button type="submit" class="btn btn-primary">Guardar Modificación</button>
    
    </form>


@stop




