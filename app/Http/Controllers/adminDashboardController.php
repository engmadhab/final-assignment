<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;

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

        $rentals = Rental::paginate(8);    
        
        $totalEarnings = Rental::where('status', 'Ended')->where('payment_status', 'Paid')->sum('total_price');
        return view('admin.adminDashboard', compact('clients', 'totalEarnings', 'admins', 'cars', 'rentals'));
    }
}
