<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user); // autoLogin

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function redirectTo()
    {
        if (auth()->user()->superAdmin == true) {
            return '/super/admin/add/user';
        }else if (auth()->user()->superAdmin == false && auth()->user()->isAdmin == true){
            return '/home';
        }else{
            return '/home';
        }
    }

    public function __construct()
    {
//        $this->middleware('auth');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'isAdmin' => ['required']
        ]);
    }

    protected function create(array $data)
    {
//        dd(auth()->user()->isAdmin);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'isAdmin' => $data['isAdmin'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
