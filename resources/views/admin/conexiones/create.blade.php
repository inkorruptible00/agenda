@extends('adminlte::page')

@section('css')
   
@stop

@section('js')

    
@stop


@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Nueva Conexión</h1>
@stop

@section('content')

    <table id="tabla01" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Concepto</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <th>Id</th>
                <th>{{$contacto->id}}</th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>{{$contacto->nombre}}</th>
            </tr>
            <tr>
                <th>Teléfono</th>
                <th>{{$contacto->telefono}}</th>
            </tr>
            <tr>
                <th>Email</th>
                <th>{{$contacto->email}}</th>
            </tr>
        <tbody>
    </table>

    <br>


    <table id="tabla02" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha conexión</th>
                <th>Próxima conexión</th>
                <th>Memo conexión</th>                
            </tr>
        </thead>
        <tbody>
            @foreach($conexiones as $conexion)
            <tr>
                <th>{{$conexion->id}}</th>
                <th>{{ date("d/m/Y", strtotime($conexion->fecha_conexion)) }}</th>
                <th>{{ date("d/m/Y", strtotime($conexion->proxima_conexion)) }} - {{ date("H:i", strtotime($conexion->proxima_conexion)) }}</th>
                <th>{{$conexion->memo_conexion}}</th>                
            </tr>
            @endforeach
        <tbody>
    </table>




    <form name="add" id="add" method="post" action="{{url('grabarRegistroConexion')}}">
        @csrf

        <label for="fname">Contacto id:</label><br>
        <input type="text" id="contacto_id" name="contacto_id" value="{{$contacto->id}}"><br>

        <label for="fname">Fecha conexión: (ejemplo: "02/07/2021 a las 10:00" deberá ingresar "2021-07-02 10:00:00")</label><br>
        <input type="text" id="fecha_conexion" name="fecha_conexion"><br>

        <label for="fname">Próxima conexión: (ejemplo: "02/07/2021 a las 10:00" deberá ingresar "2021-07-02 10:00:00")</label><br>
        <input type="text" id="proxima_conexion" name="proxima_conexion"><br>
      
        <label for="lname">Campo memo:</label><br>
        <textarea id="memo_conexion" name="memo_conexion" cols="70" rows="10"></textarea><br>
        
        <p>
        <p> 

        <button type="submit" class="btn btn-primary">Guardar Conexión</button>
    
    </form>


@stop




