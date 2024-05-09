<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Genre;
use App\Models\User;
use App\Models\Instrument;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Config;


class AdvertisementController extends Controller
{
    public function createPage(Request $request)
    {
        if (auth()->check()) {
            $user = \Illuminate\Support\Facades\Auth::user();
            $cities = City::all();
            $instruments = Instrument::orderBy('name')->get();
            $genres = Genre::orderBy('name')->get();
            $instrumentsCategories = Config::get(['instrumentsCategories']);
            return view('advertisement.create', compact('user', 'cities', 'instruments', 'genres', 'instrumentsCategories'));
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Для размещения объявления необходимо авторизоваться или зарегистрироваться.']);
        }
    }

    public function show($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $user = \Illuminate\Support\Facades\Auth::user();
        $creator = $advertisement->user;
        return view('advertisement.show', compact('advertisement', 'creator', 'user'));
    }

    public function showProfile($userId)
    {
        if (auth()->check()) {
            $creator = User::find($userId);
            $user = \Illuminate\Support\Facades\Auth::user();
            $advertisements = [Advertisement::find($userId)];
            if (!$creator) {
                return redirect()->back()->with('error', 'Пользователь не найден.');
            }
            return view('user.public_profile', compact('creator', 'user', 'advertisements'));
        }
        else{
            return redirect()->route('login')->withErrors(['error' => 'Для просмотра профилей необходимо авторизоваться или зарегистрироваться.']);
        }
    }

    public function respondToAd()
    {
        if (auth()->check()) {
            return redirect()->back()->with('success', 'Отклик успешно отправлен.');
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Для отклика на объявления необходимо авторизоваться или зарегистрироваться.']);
        }
    }


}
