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
            PeopleTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ProjectTypesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            EventTypesTableSeeder::class,
        ]);
    }
}
