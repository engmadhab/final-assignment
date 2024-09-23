<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Rental;

class DashboardController extends Controller
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
        $pendingPayments = Rental::where('status', 'Completed' )->where( 'payment_status', 'Pending')->sum('total_price');
        $totalEarnings = Rental::where('status', 'Completed')->where('payment_status', 'Paid')->sum('total_price');

        return view('admin.Dashboard', compact('clients', 'totalEarnings', 'admins', 'cars', 'rentals', 'pendingPayments'));
    }
}
