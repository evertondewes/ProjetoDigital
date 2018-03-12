<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'city_id' => DB::table('cities')->where('name', env('CITY'))->first()->id,
                'person_id' => 1,
                'number' => 11,
                'street' => 'Rua do isaac',
                'district' => 'Bairro do isaac',
            ],
            [
                'city_id' => DB::table('cities')->where('name', env('CITY'))->first()->id,
                'person_id' => 2,
                'number' => 12,
                'street' => 'Rua do albert',
                'district' => 'Bairro do albert',
            ],
            [
                'city_id' => DB::table('cities')->where('name', env('CITY'))->first()->id,
                'person_id' => 3,
                'number' => 13,
                'street' => 'Rua do galileu',
                'district' => 'Bairro do galileu',
            ],
            [
                'city_id' => DB::table('cities')->where('name', env('CITY'))->first()->id,
                'person_id' => 4,
                'number' => 14,
                'street' => 'Rua do antoine',
                'district' => 'Bairro do antoine',
            ],
            [
                'city_id' => DB::table('cities')->where('name', env('CITY'))->first()->id,
                'person_id' => 5,
                'number' => 15,
                'street' => 'Rua do stephen',
                'district' => 'Bairro do stephen',
            ],
        ]);
    }
}
