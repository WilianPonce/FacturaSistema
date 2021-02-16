<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;
use App\Models\Establecimiento;
use App\Models\PuntoEmision;

class PuntoEmisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PuntoEmision::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numberBetween(-10000, 10000),
            'nombre' => $this->faker->word,
            'serie' => $this->faker->word,
            'factura' => $this->faker->word,
            'nota_credito' => $this->faker->word,
            'nota_debito' => $this->faker->word,
            'guia_remision' => $this->faker->word,
            'retencion_compra' => $this->faker->word,
            'liquidacion_compra' => $this->faker->word,
            'estado' => $this->faker->boolean,
            'empresa_id' => Empresa::factory(),
            'establecimiento_id' => Establecimiento::factory(),
        ];
    }
}
