<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    protected $table = 'perros';
    protected $fillable = [
        'raza_id',
        'user_id',
        'nombre',
        'edad',
        'sexo',
        'descripcion',
    ];
    public function raza() {
    return $this->belongsTo(Raza::class);
    }

    public function citas() {
        return $this->hasMany(Cita::class);
    }

    public function adopcion() {
        return $this->hasOne(Adopcion::class);
    }

    public function fotos() {
        return $this->hasMany(FotoPerro::class);
    }

}
