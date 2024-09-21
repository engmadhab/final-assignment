<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Reservation;

class adminDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $clients = User::where('role', 'customer')->count();
        $admins = User::where('role', 'admin')->count();
        $cars = Car::all();

        $reservations = Reservation::paginate(8);    
        
        // dd($reservations);
        $avatars = User::all();
        return view('admin.adminDashboard', compact('clients', 'avatars', 'admins', 'cars', 'reservations'));
    }
}
