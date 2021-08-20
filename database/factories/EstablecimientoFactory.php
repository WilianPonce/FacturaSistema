<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;
use App\Models\Establecimiento;

class EstablecimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Establecimiento::class;

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
            'url_web' => $this->faker->word,
            'nombre_comercial' => $this->faker->word,
            'direccion' => $this->faker->word,
            'estado' => $this->faker->boolean,
            'empresa_id' => Empresa::factory(),
        ];
    }
}
