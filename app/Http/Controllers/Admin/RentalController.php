<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
class RentalController extends Controller
{
    public function editPayment(Rental $rental)
    {
        $rental = Rental::find($rental->id);
        return view('admin.updatePayment', compact('rental'));
    }

    public function updatePayment(Rental $rental, Request $request)
    {
        $rental = Rental::find($rental->id);
        $rental->payment_status = $request->payment_status;
        $rental->save();
        return redirect()->route('Dashboard');
    }

    // Edit and Update Reservation Status
    public function editStatus(Rental $rental)
    {
        $rental = Rental::find($rental->id);
        return view('admin.updateStatus', compact('rental'));
    }

    public function updateStatus(Rental $rental, Request $request)
    {
        $rental = Rental::find($rental->id);
        $rental->status = $request->status;
        $car = $rental->car;
        if($request->status == 'Completed' || $request->status == 'Canceled' ){
            $car->availability = 'Available';
            $car->save();
        }
        $rental->save();
        return redirect()->route('Dashboard');
    }
}
