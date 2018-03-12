<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            PeopleTableSeeder::class, // temporário
            UsersTableSeeder::class,
            ProjectTypesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            EventTypesTableSeeder::class,

            // temporário
            PhoneNumbersTableSeeder::class,
            AddressesTableSeeder::class,
        ]);
    }
}
