<?php

use Illuminate\Database\Seeder;

class PhoneNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone_numbers')->insert([
            [
                'phone' => 11111111,
                'area_code' => 55,
                'person_id' => 1,
            ],
            [
                'phone' => 22222222,
                'area_code' => 55,
                'person_id' => 2,
            ],
            [
                'phone' => 33333333,
                'area_code' => 55,
                'person_id' => 3,
            ],
            [
                'phone' => 44444444,
                'area_code' => 55,
                'person_id' => 4,
            ],
            [
                'phone' => 55555555,
                'area_code' => 55,
                'person_id' => 5,
            ],
        ]);
    }
}
