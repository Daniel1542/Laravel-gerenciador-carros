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
            ->count(10)
            ->create();

        $proprietarios->each(function ($proprietario) {
            Veiculo::factory()
                ->create(['cpf' => $proprietario->cpf]);
        });

        Veiculo::all()->each(function ($veiculo) {
            Revisao::factory()
                ->create(['placa' => $veiculo->placa]);
        });

    }
}
