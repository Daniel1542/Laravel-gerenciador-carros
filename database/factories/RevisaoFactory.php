<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Revisao;
use App\Models\Veiculo;

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
            'veiculo_id' => function () {
                return Veiculo::factory()->create()->id;
            },
            'data' => $this->faker->date(),
            'tempo' => $this->faker->numberBetween(1, 8),
        ];
    }
}
