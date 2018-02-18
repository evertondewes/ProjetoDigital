<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client;

        $response = $client->get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');

        $states = json_decode($response->getBody(), true);

        $dataToInsert = [];

        foreach ($states as $state) {
            $dataToInsert[] = [
                'id' => $state['id'],
                'name' => $state['nome'],
                'abbreviation' => $state['sigla'],
            ];
        }

        DB::table('states')->insert($dataToInsert);
    }
}
