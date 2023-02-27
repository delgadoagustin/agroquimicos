<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empresa;

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
     */
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(["fabricante","importador","distribuidor","expendedor"]),
            'nombre' => $this->faker->regexify('[A-Za-z0-9]{40}'),
            'cuit' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'domicilio_empresa' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'telefono_empresa' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'titular' => $this->faker->regexify('[A-Za-z0-9]{40}'),
            'dni_titular' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'asesor' => $this->faker->regexify('[A-Za-z0-9]{40}'),
            'matricula' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'domicilio_asesor' => $this->faker->regexify('[A-Za-z0-9]{80}'),
            'dni_asesor' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'telefono_asesor' => $this->faker->regexify('[A-Za-z0-9]{15}'),
        ];
    }
}
