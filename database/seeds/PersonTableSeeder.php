<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([[
            'name' => 'Isaac Newton',
            'email' => 'isaac.newton@exemplo.com',
            'cpf_cnpj' => '81879183579',
            'crea_cau' => null,
        ],[
            'name' => 'Albert Einstein',
            'email' => 'albert.einstein@exemplo.com',
            'cpf_cnpj' => '56234272789',
            'crea_cau' => null,
        ],[
            'name' => 'Galileu Galilei',
            'email' => 'galileu.galilei@exemplo.com',
            'cpf_cnpj' => '81498725406',
            'crea_cau' => 'RS12345678',
        ],[
            'name' => 'Antoine Lavoisier',
            'email' => 'antoine.lavoisier@exemplo.com',
            'cpf_cnpj' => '67784337523',
            'crea_cau' => null,
        ],[
            'name' => 'Stephen Hawking',
            'email' => 'stephen.hawking@exemplo.com',
            'cpf_cnpj' => '37221754454',
            'crea_cau' => null,
        ]]);

    }
}
