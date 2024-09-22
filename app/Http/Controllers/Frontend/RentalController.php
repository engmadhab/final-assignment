<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
class RentalController extends Controller
{
    public function create($car_id)
    {
        $user = auth()->user();
        $car = Car::find($car_id);
        return view('reservation.create', compact('car', 'user'));
    }
    public function store(Request $request, $car_id)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',

        ]);


        $car = Car::find($car_id);
        $user = User::find($request->user);

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);

        $rental = new Rental();
        $rental->user()->associate($user);
        $rental->car()->associate($car);
        $rental->start_date = $start;
        $rental->end_date = $end;
        $rental->days = $start->diffInDays($end);
        $rental->price_per_day = $car->daily_rent_price;
        $rental->total_price = $rental->days * $rental->price_per_day;
        $rental->status = 'Pending';
        $rental->payment_method = 'By Cash';
        $rental->payment_status = 'Pending';
        $rental->save();

        $car->availability = 'Reserved';
        $car->save();

        return view('thankyou',['reservation'=>$rental] );
    }

}
