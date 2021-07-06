<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'nombre',
        'email',
        'telefono',
        'horario_contacto',
        'campo_memo',
        'activo',
        'motivo_desactivacion',
    ];


    public function consulta_todas_las_conexiones(){
        return $todasLasConexiones = $this->hasMany(Conexion::class);
    }


    public function consulta_proxima_conexion(){
        $todasLasConexiones = $this->hasMany(Conexion::class);
        return $todasLasConexiones->orderByDesc('id')->take(1);
    }

}
