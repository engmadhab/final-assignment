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
                'name' => 'Audi',
                'brand' => 'Audi',
                'model' => 'A4',
                'year' => '2018',
                'car_type' => 'Sedan',
                'daily_rent_price' => 50,
                'availability' => 'Available',
                'image' => '/images/cars/Audi_A4.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Model S',
                'brand' => 'Tesla',
                'model' => 'Long Range',
                'year' => '2022',
                'car_type' => 'Electric',
                'daily_rent_price' => 45,
                'availability' => 'Available',
                'image' => '/images/cars/Tesla_Model_3.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'BMW',
                'brand' => 'BMW',
                'model' => 'X5',
                'year' => '2021',
                'car_type' => 'Electric',
                'daily_rent_price' => 60,
                'availability' => 'Available',
                'image' => '/images/cars/BMW_X5.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Altima',
                'brand' => 'Nissan',
                'model' => 'SL',
                'year' => '2015',
                'car_type' => 'Sedan',
                'daily_rent_price' => 48,
                'availability' => 'Available',
                'image' => '/images/cars/Nissan_Altima.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Civic',
                'brand' => 'Honda',
                'model' => 'EX',
                'year' => '2016',
                'car_type' => 'Sedan',
                'daily_rent_price' => 40,
                'availability' => 'Available',
                'image' => '/images/cars/Honda_Civic.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Hyundai Tucson',
                'brand' => 'Hyundai',
                'model' => 'Tucson',
                'year' => '2014',
                'car_type' => 'Slipper',
                'daily_rent_price' => 62,
                'availability' => 'Available',
                'image' => '/images/cars/Hyundai_Tucson.jpg',
                'stars' => 5,
            ],
            [
                'name' => 'Mazda2 Hybrid',
                'brand' => 'Mazda',
                'model' => 'CX-5',
                'year' => '2015',
                'car_type' => 'Sedan',
                'daily_rent_price' => 64,
                'availability' => 'Available',
                'image' => '/images/cars/Mazda_CX-5.jpg',
                'stars' => 4,
            ],
            [
                'name' => 'Jeep Cherokee',
                'brand' => 'Jeep',
                'model' => 'Wrangler',
                'year' => '2016',
                'car_type' => 'SUV',
                'daily_rent_price' => 70,
                'availability' => 'Available',
                'image' => '/images/cars/Jeep_Wrangler.jpg',
                'stars' => 3,
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
