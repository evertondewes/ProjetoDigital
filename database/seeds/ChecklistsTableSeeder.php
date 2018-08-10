<?php

use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklists')->insert([
            ['name' => 'guia_recolhimento', 'text' => 'Guida de Recolhimento', 'project_type_id' =>'1'],
            ['name' => 'vias_memorial_descritivo', 'text' => 'Via do Memorial Descritivo da Obra', 'project_type_id' =>'1'],
            ['name' => 'plantas', 'text' => 'Plantas', 'project_type_id' =>'1'],
            ['name' => 'art_rrt', 'text' => 'ART/RRT', 'project_type_id' =>'1'],
            ['name' => 'martricula_imovel', 'text' => 'Matrícula do Imóvel', 'project_type_id' =>'1'],
        ]);
    }
}
