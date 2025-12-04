<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Raza;

class ImportRazas extends Command
{
    protected $signature = 'razas:import';
    protected $description = 'Importa razas de perros desde una API externa';

    public function handle()
    {
        $this->info('Descargando razas...');

        $response = Http::get('https://api.thedogapi.com/v1/breeds');

        if ($response->ok()) {
            $razas = $response->json();

            foreach ($razas as $raza) {
                Raza::updateOrCreate(
                    ['nombre' => $raza['name']],
                    ['nombre' => $raza['name']]
                );
            }

            $this->info('Razas importadas correctamente!');
        } else {
            $this->error('Error al obtener datos de la API');
        }
    }
}
