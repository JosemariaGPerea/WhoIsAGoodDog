<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotoPerro extends Model
{
    protected $table = 'fotos_perros';
    protected $fillable = [
        'perro_id',
        'user_id',
        'ruta',
    ];
    
   public function perro() {
    return $this->belongsTo(Perro::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
