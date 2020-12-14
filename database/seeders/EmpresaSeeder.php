<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::factory()->create(['razon_comercial' => 'C razon', 'direccion' => 'Guayaquil', 'razon_social' => 'A social']);
        Empresa::factory()->create(['razon_comercial' => 'B razon','direccion' => 'Quito', 'razon_social' => 'C social']);
        Empresa::factory()->create(['razon_comercial' => 'A razon', 'direccion' => 'Cuenca', 'razon_social' => 'B social']);
        $empresa = Empresa::factory()->times(12)->create();
    }
}
