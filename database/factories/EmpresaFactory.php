<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\Moneda;
use App\Models\Provincia;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'periodo' => $this->faker->date(),
            'razon_social' => $this->faker->word,
            'razon_comercial' => $this->faker->word,
            'ruc' => $this->faker->word,
            'direccion' => $this->faker->word,
            'telefono' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'email_password' => $this->faker->word,
            'email_server' => $this->faker->word,
            'email_port' => $this->faker->word,
            'email_security' => $this->faker->word,
            'obligado_contabilidad' => $this->faker->boolean,
            'contador_nombre' => $this->faker->word,
            'contador_ruc' => $this->faker->word,
            'representante_nombre' => $this->faker->word,
            'representante_ruc' => $this->faker->word,
            'periodo_inicio' => $this->faker->date(),
            'periodo_fin' => $this->faker->date(),
            'tipo_cuentas' => $this->faker->word,
            'logotipo' => $this->faker->word,
            'firma_electronica' => $this->faker->word,
            'firma_electronica_password' => $this->faker->word,
            'firma_electronica_expiracion' => $this->faker->date(),
            'firma_electronica_actualizacion' => $this->faker->date(),
            'tipo_emision' => $this->faker->boolean,
            'ambiente' => $this->faker->boolean,
            'facturar_negativo' => $this->faker->boolean,
            'moneda_id' => Moneda::factory(),
            'provincia_id' => Provincia::factory(),
            'ciudad_id' => Ciudad::factory(),
            'email_facturacion' => $this->faker->word,
            'leyenda_facturacion' => $this->faker->word,
        ];
    }
}
