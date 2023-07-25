<?php

namespace Database\Seeders;

use App\Models\Configurations\Cities;
use Illuminate\Database\Seeder;

class CitiesSeeders extends Seeder
{
    public function run(): void
    {
        $cities = json_decode(file_get_contents(database_path('seeders/files/estados-cidades.json')), true);

        foreach ($cities as $city) {
            foreach ($city['cidades'] as $cityName) {
                Cities::create([
                    'name' => $cityName,
                    'state' => $city['sigla'],
                ]);
            }
        }
    }

}
