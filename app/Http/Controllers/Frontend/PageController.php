<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
class PageController extends Controller
{
    public function index()
    {
        $cars = Car::where('availability', '=', 'available')->get();
        return view('home', compact('cars'));
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
}
