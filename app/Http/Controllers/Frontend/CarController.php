<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('availability', '=', 'available')->paginate(9);
        return view('cars.cars', compact('cars'));
    }
}
