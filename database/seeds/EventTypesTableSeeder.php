<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            ['name' => 'aprovado', 'description' => 'Aprovado'],
            ['name' => 'indeferido', 'description' => 'Indeferido'],
            ['name' => 'pendencias', 'description' => 'Pendências'],
            ['name' => 'aguardando_vistoria', 'description' => 'Aguardando Vistoria'],
        ]);
    }
}
