<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Establecimiento;
use App\Models\PuntoEmision;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::factory()->times(12)->create();
        Empresa::factory()->create(['razon_comercial' => 'C razon', 'direccion' => 'Guayaquil', 'razon_social' => 'A social']);
        Empresa::factory()->create(['razon_comercial' => 'B razon','direccion' => 'Quito', 'razon_social' => 'C social']);
        Empresa::factory()->create(['razon_comercial' => 'A razon', 'direccion' => 'Cuenca', 'razon_social' => 'B social']);

        Establecimiento::factory()->times(20)->create();
        PuntoEmision::factory()->times(20)->create();
    }
}
