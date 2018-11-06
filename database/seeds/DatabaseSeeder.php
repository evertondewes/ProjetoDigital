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
            DocumentTypesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            EventTypesTableSeeder::class,
            StatusTableSeeder::class,
            // temporário
            PhoneNumbersTableSeeder::class,
            AddressesTableSeeder::class,
            DocumentTypeProjectTypeTableTableSeeder::class,
        ]);
    }
}
