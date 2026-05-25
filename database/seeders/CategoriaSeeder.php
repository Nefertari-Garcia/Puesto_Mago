<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Eliminar todas las categorías existentes
        Categoria::truncate();

        $categorias = ['Para el trabajo', 'Para escuela', 'Para escalar'];

        foreach ($categorias as $nombre) {
            Categoria::create(['nombre' => $nombre]);
        }
    }
}
