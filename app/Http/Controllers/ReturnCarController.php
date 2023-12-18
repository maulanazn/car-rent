<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentCar;
use App\Models\ReturnCar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReturnCarController extends Controller
{
    public function create(int $id): View
    {
        $car_rented_away = RentCar::find($id);

        return view('rent.return_car', ['car_rented_away' => $car_rented_away]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'license_plate_number' => 'required'
        ]);

        $car = Car::find($id);

        $car->update([
            'status' => 'away',
        ]);

        return redirect('/profile', 303);
    }
}
