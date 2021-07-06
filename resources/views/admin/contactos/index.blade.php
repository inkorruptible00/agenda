@extends('adminlte::page')

@section('css')

@stop

@section('plugins.Datatables', true)

@section('js')
    
    <script> 
        $(document).ready(function() {
            $('#tabla01').DataTable();
        } );
    </script>

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
    <h1>Usuarios</h1>
@stop

@section('content')
    
    <a class="btn btn-primary" href="{{route('contactos.create')}}" role="button">Crear Registro</a>

    </p>

    <table id="tabla01" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th >Id</th>
                <th>Nombre</th>                
                <th>Ordenar</th>
                <th>Fecha Prox.Con.</th>
                <th>Nueva</th>
                <th>Editar</th>
                <th>Borrar</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contacto)
            <tr>
                <th><a href="{{route('contactos.show',$contacto)}}">{{$contacto->id}}</a></th>
                <th><a href="{{route('contactos.show',$contacto)}}">{{$contacto->nombre}}</a></th>                

                <th>
                    @if(!$contacto->consulta_proxima_conexion->isEmpty())
                        {{ $contacto->consulta_proxima_conexion[0]->proxima_conexion }}
                    @else
                        -
                    @endif
                </th>

                <th>
                    @if(!$contacto->consulta_proxima_conexion->isEmpty())
                        {{ date("d/m/Y", strtotime($contacto->consulta_proxima_conexion[0]->proxima_conexion)) }} - {{ date("H:i", strtotime($contacto->consulta_proxima_conexion[0]->proxima_conexion)) }}
                    @else
                        -
                    @endif
                </th>
               
                <th><a href="{{url('admin/conexiones/create/'.$contacto->id)}}">Nueva Conexión</a></th>                
                <th><a href="{{route('contactos.edit',$contacto)}}">Editar Contacto</a></th>
                <th><a href="{{route('contactos.destroy',$contacto)}}" class="borrar">Borrar</a></th>

            </tr>
            @endforeach
        <tbody>
    </table>

@stop