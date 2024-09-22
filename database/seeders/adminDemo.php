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
            'name' => 'Admin User',
            'phone' => '1234567890',
            'address' => 'Sector 11, Uttara Dhaka',
            'email' => 'admin@email.com',
            'password' => Hash::make('pass1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Customer User',
            'phone' => '1234567890',
            'address' => 'Sector 11, Uttara Dhaka',
            'email' => 'customer@email.com',
            'password' => Hash::make('pass1234'),
            'role' => 'customer'
        ]);
    }
}
