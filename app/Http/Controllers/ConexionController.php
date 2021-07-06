<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Conexion;


class ConexionController extends Controller
{
    public function create(Contacto $contacto)
    {
        $conexiones = Conexion::where('contacto_id', $contacto->id)->orderByDesc('fecha_conexion')->limit(5)->get();
        return view('admin.conexiones.create', compact('contacto','conexiones'));
        
    }

    public function store(Request $request, Contacto $contacto)
    {
        Conexion::create($request->all());
        $conexiones = Conexion::where('contacto_id', $contacto->id)->orderByDesc('fecha_conexion')->limit(5)->get();
        $contactos = Contacto::where('activo','activo')->get();
        return view('admin.contactos.index', compact('contacto','conexiones','contactos'));
    }

    public function edit(Conexion $conexion)
    {
        return view('admin.conexiones.edit', compact('conexion'));
    }

    public function update(Request $request, Conexion $conexion)
    {
       $conexion->update($request->all());
       return redirect()->route('contactos');
    }


    public function destroy(Conexion $conexione)
    {
        $conexione->delete();  		
        return redirect()->route('contactos');
    }



}
