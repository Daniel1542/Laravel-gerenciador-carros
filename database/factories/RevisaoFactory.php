<?php

namespace Database\Factories;

use App\Models\Veiculo;
use App\Models\Revisao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revisao>
 */
class RevisaoFactory extends Factory
{
   /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Revisao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => Veiculo::factory(),
            'data' => $this->faker->date(),
            'descricao' => $this->faker->sentence(),
        ];
    }
}
