<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthenticationService 
{
    public function insert(Request $request): RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'driver_license_number' => $request->driver_license_number
        ]);

        return redirect('/login', 303);
    }

    public function selectName(Request $request): RedirectResponse
    {
        if (User::where('name', $request->name)->count() == 0 && !$request->session()->has("name")) {
            return redirect('/login', 303);
        }
        
        $request->session()->put("name", $request->name);
        
        $request->session()->flash("success", "You are logged in, explore our website now");

        return redirect('/', 303);
    }
}