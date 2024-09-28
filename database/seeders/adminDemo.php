<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class adminDemo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Madhab-Admin',
            'phone' => '01747654201',
            'address' => 'Sector 11, Uttara Dhaka',
            'email' => 'madhabkumarjoy@gmail.com',
            'password' => Hash::make('pass1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Joy-User',
            'phone' => '01677368828',
            'address' => 'Sector 11, Uttara Dhaka',
            'email' => 'madhab@pulseservicesbd.com',
            'password' => Hash::make('pass1234'),
            'role' => 'customer'
        ]);
    }
}
