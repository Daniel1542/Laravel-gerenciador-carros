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
            'id_proprietario' => function () {
                return Proprietario::factory()->create()->id;
            },
            'modelo' => $this->faker->word,
            'marca' => $this->faker->company,
            'placa' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
        ];
    }
}
