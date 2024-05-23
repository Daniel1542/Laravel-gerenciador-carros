<?php

namespace Database\Factories;

use App\Models\Veiculo;
use App\Models\Proprietario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => Proprietario::factory(),
            'modelo' => $this->faker->word, // Nome aleatório de carro
            'marca' => $this->faker->company, // Nome aleatório de companhia
            'placa' => strtoupper($this->faker->bothify('???####')), // Nome aleatório com letras
        ];
    }
}
