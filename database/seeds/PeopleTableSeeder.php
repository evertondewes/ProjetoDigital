<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('people')->insert([
            [
                'name' => 'Isaac Newton',
                'email' => 'isaac.newton@exemplo.com',
                'cpf_cnpj' => '81879183579',
                'crea_cau' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Albert Einstein',
                'email' => 'albert.einstein@exemplo.com',
                'cpf_cnpj' => '56234272789',
                'crea_cau' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Galileu Galilei',
                'email' => 'galileu.galilei@exemplo.com',
                'cpf_cnpj' => '81498725406',
                'crea_cau' => 'RS12345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Antoine Lavoisier',
                'email' => 'antoine.lavoisier@exemplo.com',
                'cpf_cnpj' => '67784337523',
                'crea_cau' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stephen Hawking',
                'email' => 'stephen.hawking@exemplo.com',
                'cpf_cnpj' => '37221754454',
                'crea_cau' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
