<?php

namespace App\Http\Controllers;
use App\Models\Manufacturer;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::withCount('cars')->get();
        return view('home', compact('manufacturers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $cars = Car::whereHas('manufacturer', function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })
        ->orWhere('model', 'like', "%{$query}%")
        ->orWhere('year', 'like', "%{$query}%")
        ->orWhere('color', 'like', "%{$query}%")
        ->get();

        return view('search', compact('cars', 'query'));
    }
}
