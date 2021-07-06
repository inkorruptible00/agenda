<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexion extends Model
{
    use HasFactory;

    protected $table = 'conexiones';

    protected $fillable = [
        'id',
        'contacto_id', 
        'fecha_conexion',
        'memo_conexion',
        'proxima_conexion',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }

}
