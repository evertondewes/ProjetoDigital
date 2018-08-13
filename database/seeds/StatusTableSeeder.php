<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
          ['name' => 'em_analise', 'description' => 'Em Analise'],
          ['name' => 'autorizado', 'description' => 'Autorizado'],
          ['name' => 'indeferido', 'description' => 'Indeferido'],
          ['name' => 'pendencias', 'description' => 'Pendências'],
          ['name' => 'aguardando_vistoria', 'description' => 'Aguardando Vistoria']
        ]);
    }
}
