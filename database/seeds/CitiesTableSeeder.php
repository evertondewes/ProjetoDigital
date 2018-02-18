<?php

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client;

        $states = DB::table('states')->get();

        foreach ($states as $state) {
            $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/';
            $url .= $state->id . '/municipios';

            $cities = json_decode($client->get($url)->getBody(), true);

            $dataToInsert = [];

            foreach ($cities as $city) {
                $dataToInsert[] = [
                    'id' => $city['id'],
                    'name' => $city['nome'],
                    'state_id' => $state->id,
                ];
            }

            DB::table('cities')->insert($dataToInsert);
        }
    }
}
