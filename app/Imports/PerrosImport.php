<?php

namespace App\Imports;

use App\Models\Perro;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerrosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Perro([
            'nombre' => $row['nombre'],
            'raza_id'   => $row['raza_id'],
            'edad'   => $row['edad'],
            'sexo' => $row['sexo'],
            'descripcion' => $row['descripcion'],
            
        ]);
    }
}
