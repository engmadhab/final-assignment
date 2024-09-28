<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class carSearchController extends Controller
{
    public function search(Request $request)
    {
        // Parse prices to int
        $minPrice = intval($request->min_price);
        $maxPrice = intval($request->max_price);

        // Prepare the base query to select cars
        $query = Car::query();

        // Check if the 'brand' input is provided and add the filter to the query
        if ($request->filled('brand')) {
            $query->where('brand', 'like', '%' . $request->brand . '%');
        }

        // Check if the 'model' input is provided and add the filter to the query
        if ($request->filled('car_type')) {
            $query->where('car_type', 'like', '%' . $request->car_type . '%');
        }

        // Check if the 'min_price' input is provided and add the filter to the query
        if ($request->filled('min_price')) {
            $minPrice = is_numeric($request->min_price) ? $request->min_price : 0;
            $query->where('daily_rent_price', '>=', $minPrice);
        }

        // Check if the 'max_price' input is provided and add the filter to the query
        if ($request->filled('max_price')) {
            $maxPrice = is_numeric($request->max_price) ? $request->max_price : PHP_INT_MAX;
            $query->where('daily_rent_price', '<=', $maxPrice);
        }

        // Add the 'status' filter to only show available cars
        $query->where('availability', '=', 'available');

        // Execute the query and paginate the results
        $cars = $query->paginate(4);

        // Include any additional query parameters in the pagination links
        $cars->appends($request->except('page'));


        return view('cars.searchedCars', compact('cars'));
    }
}
