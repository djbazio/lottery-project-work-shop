<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
     protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'fname' => ['required', 'string', 'min:2', 'max:255'],
            'lname' => ['required', 'string', 'min:2', 'max:255'],
            'address' => ['required', 'string', 'min:6', 'max:500'],
            'username' => ['required', 'string', 'min:6', 'max:12', 'unique:users', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
            'tel' => ['required', 'string', 'min:10', 'max:10', 'unique:users', 'unique:customers'],
        ]);
    }

    ///คอมเม้นนี้คือ หลังจากสมัครจะไม่ให้ล็อกอิน
    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\Models\User
    //  */
    protected function create(array $data)
    {
        return Customers::create([
            'fname' => $data['fname'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'tel' => $data['tel'],
            'lname' => $data['lname'],
            'address' => $data['address'],
            'money' => "0",
        ]);
    }
}
