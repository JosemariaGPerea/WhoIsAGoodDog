<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopcion extends Model
{
    protected $table = 'adopciones';
    protected $fillable = [
        'perro_id',
        'user_id',
        'fecha_adopcion',
    ];
    public function perro() {
    return $this->belongsTo(Perro::class);
        }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
