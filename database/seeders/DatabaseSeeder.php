<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proprietario;
use App\Models\Veiculo;
use App\Models\Revisao;

class DatabaseSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     *
     */
    public function run()
    {
        $proprietarios = Proprietario::factory()
            ->count(15)
            ->create();

        $proprietarios->each(function ($proprietario) {
            Veiculo::factory()
                ->create(['id_proprietario' => $proprietario->id]);
        });

        Veiculo::all()->each(function ($veiculo) {
            Revisao::factory()
                ->create(['id_veiculo' => $veiculo->id]);
        });
    }
}
