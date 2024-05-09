<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(storage_path('app/music-genres.json'));
        $genres = json_decode($json, true);

        if (is_array($genres)) {
            foreach ($genres as $genre) {
                Genre::create([
                    'name' => $genre['name'] ?? '',
                ]);
            }
        } else {
            echo "Error: Failed to decode JSON data.";
        }
    }
}
