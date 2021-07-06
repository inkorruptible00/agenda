<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Conexion;
use App\Http\Requests\UpdateContactoRequest;

class ContactoController extends Controller
{


    public function index()
    {
        $contactos = Contacto::where('activo','activo')->get();

        return view('admin.contactos.index', compact('contactos'));
    }


    public function create()
    {
        return view('admin.contactos.create');
    }


    public function store(Request $request)
    {
        Contacto::create($request->all());
        return redirect()->route('contactos');
    }

    public function show(Contacto $contacto)
    {
        $conexiones = Conexion::where('contacto_id', $contacto->id)->orderByDesc('fecha_conexion')->limit(5)->get();
        $proximaConexion = Conexion::where('contacto_id', $contacto->id)->orderByDesc('fecha_conexion')->limit(1)->get();
                
        return view('admin.contactos.show', compact('contacto','conexiones','proximaConexion'));
        
    }

    public function edit(Contacto $contacto)
    {
        return view('admin.contactos.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
       $contacto->update($request->all());
       return redirect()->route('contactos');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->activo = "inactivo";
        $contacto->save();  		
        return redirect()->route('contactos');
    }

}
