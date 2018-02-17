<?php

use Illuminate\Database\Seeder;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_types')->insert([
            ['name' => 'edificacao_nova', 'description' => 'Edificações Novas'],
            ['name' => 'edificacao_ampliacao', 'description' => 'Ampliação de Edificação'],
            ['name' => 'edificacao_reforma', 'description' => 'Reforma de Edificação'],
            ['name' => 'edificacao_regularizacao', 'description' => 'Regularização de Edificação'],
            ['name' => 'lotes_desmembramento_remembramento', 'description' => 'Desmembramento / Remembramento de Lote'],
            ['name' => 'certidao', 'description' => 'Certidão'],
        ]);
    }
}
