<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $cars = Car::all();

        return view('welcome', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('rent.add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'brand' => 'required|string|min:3',
            'type' => 'required|string|min:3',
            'license_plate_number' => 'required|string|min:3',
            'rent_per_day' => 'required|integer',
        ]);

        Car::create([
            'brand' => $request->brand,
            'type' => $request->type,
            'license_plate_number' => $request->license_plate_number,
            'rent_per_day' => $request->rent_per_day,
            'user_name' => session()->get('name'),
            'status' => 'away'
        ]);

        return redirect('/profile', 303);
    }
}
