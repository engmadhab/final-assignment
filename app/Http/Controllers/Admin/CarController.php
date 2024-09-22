<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(8);
        return view('admin.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'daily_rent_price' => 'required',
            'availability' => 'required',            
            'stars' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $car = new Car;
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->car_type = $request->car_type;
        $car->daily_rent_price = $request->daily_rent_price;        
        $car->availability = $request->availability;        
        $car->stars = $request->stars;

        if ($request->hasFile('image')) {
            $imageName = $request->brand . '-' . $request->model . '-' . $request->engine . '-' . Str::random(10) . '.' . $request->file('image')->extension();
            $image = $request->file('image');
            $path = $image->storeAs('/images/cars', $imageName);
            $car->image = '/'.$path;
        }
        // dd($car);
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $car = Car::findOrFail($car->id);
        return view('admin.updateCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'car_type' => 'required',
            'daily_rent_price' => 'required',
            'availability' => 'required',         
            'stars' => 'required',
        ]);

        $car = Car::findOrFail($car->id);

        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->car_type = $request->car_type;
        $car->daily_rent_price = $request->daily_rent_price;        
        $car->availability = $request->availability;       
        $car->stars = $request->stars;

        if ($request->hasFile('image')) {

            $filename = basename($car->image);
            Storage::disk('local')->delete('/images/cars/' . $filename);
            $car->delete();

            $imageName = $request->brand . '-' . $request->model . '-' . Str::random(10) . '.' . $request->file('image')->extension();
            $image = $request->file('image');
            $path = $image->storeAs('/images/cars', $imageName);            
            $car->image = '/'.$path;
        }
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
            $car = Car::findOrFail($car->id);
        if ($car->image) {
            // Get the filename from the image path
            $filename = basename($car->image);

            // Delete the image file from the storage
            Storage::disk('local')->delete('/images/cars/' . $filename);
            $car->delete();
        }
        return redirect()->route('cars.index');
        } catch (\Exception $e) {
            $errorMsg = 'You can not delete after booking car';
            return $errorMsg;
        }
        
    }
}
