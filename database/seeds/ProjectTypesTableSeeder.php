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
            ['name' => 'Edificação Nova', 'description' => 'Edificações Novas'],
            ['name' => 'Ampliação de Edificação', 'description' => 'Ampliação de Edificação'],
            ['name' => 'Reforma de Edificação', 'description' => 'Reforma de Edificação'],
            ['name' => 'Regularização de Edificação', 'description' => 'Regularização de Edificação'],
            ['name' => 'Desmembramento / Remembramento de Lotes', 'description' => 'Desmembramento / Remembramento de Lotes'],
            ['name' => 'Certidões', 'description' => 'Certidões'],
        ]);
    }
}
