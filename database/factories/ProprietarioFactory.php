<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proprietario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proprietario>
 */
class ProprietarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proprietario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'idade' => $this->faker->numberBetween(18, 88),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
        ];
    }
}
