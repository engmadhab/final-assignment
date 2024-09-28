<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\CustomerRentalConfirmation;
use App\Mail\AdminRentalNotification;
use Illuminate\Support\Facades\Mail;

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

        // dd($user->email);
        $rental->save();

        $car->availability = 'Reserved';
        $car->save();

 
        // Assume you have validated and saved the rental data
        $rentalDetails = [
            'customerName' => $user['name'],
            'carName' => $car['name'],
            'carBrand' => $car['brand'],
            'carModel' => $car['model'],
            'totalAmount' =>  $rental->total_price
        ];

        // Send email to the customer
        // Mail::to($request->customer_email)->send(new CustomerRentalConfirmation($rentalDetails));
        Mail::to($user->email)->send(new CustomerRentalConfirmation($rentalDetails));      
        

        // Mail::send('emails.order_status',$messageData,function($message)use ($email){
        //     $message->to($email)->subject('Order Status Updated - Ecom website');
        // });

        // Send email to the admin
        Mail::to('madhabkumarjoy@gmail.com')->send(new AdminRentalNotification($rentalDetails));

        

        return view('thankyou',['reservation'=>$rental] );
    }

    public function rentals(){
        $rentals = Rental::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('clientReservations', compact('rentals'));
    }


    

}
