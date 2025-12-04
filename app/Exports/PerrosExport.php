<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PerrosExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Perro::query()->select('nombre', 'raza_id', 'edad', 'sexo', 'descripcion');
    }

    public function headings(): array
    {
        return ['Nombre', 'Raza ID', 'Edad', 'Sexo', 'Descripción'];
    }
}
