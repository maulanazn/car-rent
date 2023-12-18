<?php

namespace App\Http\Controllers;

use App\Models\RentCar;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    private AuthenticationService $authService;

    public function __construct() 
    {
        $this->authService = new AuthenticationService();
    }

    public function register(): View {
        return view('auth.register');
    }

    public function create(Request $request): RedirectResponse 
    {
        $request->validate([
            'name' => 'required|string|min:5|max:20',
            'address' => 'required|string|min:5',
            'phone' => 'required|min:5|integer',
            'driver_license_number' => 'required|string'
        ]);

        $request->session()->flash("success", "You are registered, now login");

       return $this->authService->insert($request);
    }

    public function verify(): View {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse 
    {
        $request->validate([
            'name' => 'required|string|min:5|max:20|same:name',
        ]);

        return $this->authService->selectName($request);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->remove('name');
        $request->session()->regenerateToken();

        return redirect("/login", 303);
    }

    public function profile(): View 
    {
        $rented_cars = RentCar::where('user_name', session()->get('name'))->get();

        return view('auth.profile', ['rented_cars' => $rented_cars]);
    }
}
