<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        $customers = User::where('role', 'customer')->paginate(5);
        return view('admin.users', compact('admins', 'customers'));        
    }

    public function create(){
        return view('admin.addAdmin');
    }
    
    
}
