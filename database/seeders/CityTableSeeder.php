<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\City;

class CityTableSeeder extends Seeder
{
    public function run()
    {
        $json = Storage::get('russian-cities.json');
        $cities = json_decode($json, true);

        foreach ($cities as $city) {
            City::create([
                'name' => $city['name'] ?? '',
                'subject' => $city['subject'] ?? '',
                'district' => $city['district'] ?? '',
                'population' => $city['population'] ?? '',
                'coords_lat' => $city['coords']['lat'] ?? '', // добавляем координату широты
                'coords_lon' => $city['coords']['lon'] ?? '', // добавляем координату долготы
            ]);
        }
    }
}
