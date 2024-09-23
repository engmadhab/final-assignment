<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
class CustomerController extends Controller
{
    use RegistersUsers;
    public function show(User $user){
        $user = User::find($user->id);
        return view('admin.clientDetails', compact('user'));
    }
    public function create_customer(){
        return view('admin.addCustomer');
    }

    public function edit_customer(User $user){
        $user = User::findOrFail($user->id);   
        // dd($user);     
        return view('admin.editCustomer', compact('user'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $user = User::findOrFail($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($user['password']);
        $user->role = 'customer';    
        $user->save();

        return redirect()->route('users');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */


    // ----------------- never change the create method instead override the register method ------------------
    protected function register_customer(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));


        return $this->registered($request, $user)
            ?: redirect()->route('users');
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role' => 'customer',
        ]);
    }
    public function destroy(User $user){
        try {
            $user->delete();
            return redirect()->route('users');
        } catch (\Exception $e) {
            $errorMsg = 'You can not delete because of you have already rented our car';
            return $errorMsg;            
        }
    }
}
