<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Instrument;

class InstrumentsTableSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(storage_path('app/musical-instruments.json'));
        $instruments = json_decode($json, true);

        if (is_array($instruments)) {
            foreach ($instruments as $instrument) {
                Instrument::create([
                    'name' => $instrument['name'] ?? '',
                    'type' => $instrument['type'] ?? '',
                ]);
            }
        } else {
            echo "Error: Failed to decode JSON data.";
        }
    }
}
