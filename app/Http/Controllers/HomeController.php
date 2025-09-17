<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Weather;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private Weather $weather)
    {
    }

    public function index()
    {
//        dd($this->weather);
//        dd($weather->isSunnyTomorrow());
//        dd(Weather::class);
//        $weather = app('weather');
//        dd($weather);
        $properties = Property::available()->recent()->limit(4)->get();
//        dd($properties);

        return view('home', [
            'properties' => $properties
        ]);
    }
}
