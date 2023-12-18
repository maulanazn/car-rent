<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\RentCar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RentCarController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id): View
    {
        $car = Car::find($id);

        return view('rent.rent_car', ['car' => $car]);
    }

    public function store(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'start_rent' => 'required|date',
            'done_rent' => 'required|date',
        ]);

        RentCar::create([
            'start_rent' => $request->start_rent,
            'done_rent' => $request->done_rent,
            'license_plate_number' => $request->license_plate_number,
            'user_name' => session()->get('name'),
        ]);

        $car = Car::find($id);

        $car->update([
            'status' => 'filled',
        ]);

        return redirect('/profile', 303);
    }
}
