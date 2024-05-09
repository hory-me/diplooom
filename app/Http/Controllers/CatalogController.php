<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\Instrument;
use App\Models\Genre;
use Illuminate\Support\Facades\Config;


use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $cities = City::all();
        $instruments = Instrument::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        $advertisements = [];
        $instrumentsCategories = Config::get(['instrumentsCategories']);

        Advertisement::query()->chunk(10, function ($chunk) use (&$advertisements) {
            foreach ($chunk as $advertisement) {
                $advertisements[] = $advertisement;
            }
        });
        return view('catalog.index', compact('user', 'cities', 'instruments', 'genres', 'advertisements', 'instrumentsCategories'));
    }
}
