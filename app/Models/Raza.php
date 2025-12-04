<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    protected $table = 'razas';
    protected $fillable = [
        'nombre',
    ];
    public function perros() {
    return $this->hasMany(Perro::class);
    }
}
