<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cars = [            
            [
                'name' => 'Accord',
                'brand' => 'Honda',
                'model' => 'EX',
                'year' => '2018',
                'car_type' => 'Sedan',
                'daily_rent_price' => 50,
                'availability' => 'Available',
                'image' => '/images/cars/Honda_Civic.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Model S',
                'brand' => 'Tesla',
                'model' => 'Long Range',
                'year' => '2022',
                'car_type' => 'Electric',
                'daily_rent_price' => 60,
                'availability' => 'Available',
                'image' => '/images/cars/Tesla_Model_3.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Model X',
                'brand' => 'Tesla',
                'model' => 'Long Range',
                'year' => '2022',
                'car_type' => 'Electric',
                'daily_rent_price' => 60,
                'availability' => 'Available',
                'image' => '/images/cars/Tesla_Model_3.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Altima',
                'brand' => 'Nissan',
                'model' => 'SL',
                'year' => '2015',
                'car_type' => 'Sedan',
                'daily_rent_price' => 55,
                'availability' => 'Available',
                'image' => '/images/cars/Nissan_Altima.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Civic',
                'brand' => 'Honda',
                'model' => 'EX',
                'year' => '2018',
                'car_type' => 'Sedan',
                'daily_rent_price' => 50,
                'availability' => 'Available',
                'image' => '/images/cars/Honda_Civic.jpg',
                'stars' => 5,
            ],
        ];

        foreach ($cars as $car) {
            DB::table('cars')->insert([
                'name' => $car['name'],
                'brand' => $car['brand'],
                'model' => $car['model'],
                'year' => $car['year'],
                'car_type' => $car['car_type'],
                'daily_rent_price' => $car['daily_rent_price'],
                'availability' => $car['availability'],
                'image' => $car['image'],
                'stars' => $car['stars'],
            ]);
        }
    }
}
