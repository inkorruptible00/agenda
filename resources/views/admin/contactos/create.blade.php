@extends('adminlte::page')

@section('css')
   
@stop




@section('js')

    
@stop


@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Usuarios</h1>
@stop

@section('content')
    
    <form name="add" id="add" method="post" action="{{url('grabarRegistro')}}">
        @csrf
        <label for="fname">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" size="50"><br>

        <label for="lname">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" size="50"><br>
      
        <label for="lname">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" size="50"><br>

        <label for="lname">Horario contacto:</label><br>
        <input type="text" id="horario_contacto" name="horario_contacto"><br>

        <label for="lname">Campo memo:</label><br>
        <textarea id="campo_memo" name="campo_memo" cols="70" rows="10"></textarea><br>
        

        <p>
        <p> 
        
        <button type="submit" class="btn btn-primary">Crear usuario</button>
    
    </form>


@stop




