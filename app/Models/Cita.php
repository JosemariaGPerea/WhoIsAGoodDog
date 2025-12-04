<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = [
        'perro_id',
        'user_id',
        'fecha',
        'estado',
    ];
    public function perro() {
    return $this->belongsTo(Perro::class);
    }

    public function user() {
    return $this->belongsTo(User::class);
    }

}
