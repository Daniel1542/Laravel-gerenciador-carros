<?php

namespace Database\Seeders;

use App\Models\Revisao;
use Illuminate\Database\Seeder;

class RevisaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Revisao::factory()->count(10)->create();
    }
}
