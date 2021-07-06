@extends('adminlte::page')

@section('css')
   
@stop

@section('js')
    
    <script> 
        $(document).ready(function () {
            $(".borrar").click(function (e) { 
                e.preventDefault();
                var res=confirm("Realmente desea borrar el registro?");
                if(res==true){
                    location.href=$(this).attr("href");
                }
            });
        });
    </script>
    
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuario Seleccionado</h1>
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
            <tr>
                <th>Proxima Conexión</th>
                @if($proximaConexion->isEmpty())
                    <th>No tiene próxima conexión</th>
                @else
                    <th>{{ date("d/m/Y", strtotime($proximaConexion[0]->proxima_conexion)) }} - {{ date("H:i", strtotime($proximaConexion[0]->proxima_conexion)) }} </th>
                @endif 
            </tr>
            
        <tbody>
    </table>

    <form name="add" id="add" method="POST" action="{{route('contactos.update',$contacto)}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="lname">Campo memo:</label><br>
        <textarea id="campo_memo" name="campo_memo" cols="70" rows="10">{{$contacto->campo_memo}}</textarea><br>
        
        <button type="submit" class="btn btn-primary">Guardar Modificación Memo</button>

    </form>


    <br>

    <a class="btn btn-primary" href="{{url('admin/conexiones/create/'.$contacto->id)}}" role="button">Crear Nueva Conexión</a>

    <br>

    <table id="tabla02" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha conexión</th>
                <th>Próxima conexión</th>
                <th>Memo conexión</th>     
                <th>Editar</th>                                
                <th>Borrar</th>                                
            </tr>
        </thead>
        <tbody>
            @foreach($conexiones as $conexion)
            <tr>
                <th>{{$conexion->id}}</th>
                <th>{{ date("d/m/Y", strtotime($conexion->fecha_conexion)) }}</th>
                <th>{{ date("d/m/Y", strtotime($conexion->proxima_conexion)) }} - {{ date("H:i", strtotime($conexion->proxima_conexion)) }}</th>
                <th>{{$conexion->memo_conexion}}</th>                
                <th><a href="{{route('conexiones.edit',$conexion)}}" >Editar</a></th>              
                <th><a href="{{route('conexiones.destroy',$conexion)}}" class="borrar">Borrar</a></th>              
            </tr>
            @endforeach
        <tbody>
    </table>








    
@stop




