<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;
use App\Models\Establecimiento;
use App\Models\Punto_emision;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'telefono' => $this->faker->word,
            'celular' => $this->faker->word,
            'tipo_sangre' => $this->faker->word,
            'direccion' => $this->faker->word,
            'nombre_familiar' => $this->faker->word,
            'contacto_familiar' => $this->faker->word,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'empresa_id' => Empresa::factory(),
            'establecimiento_id' => Establecimiento::factory(),
            'punto_emision_id' => null,
            'estado' => $this->faker->boolean,
        ];
    }
}
