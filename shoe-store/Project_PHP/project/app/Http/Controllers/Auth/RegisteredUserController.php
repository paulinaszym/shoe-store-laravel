<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required','string','max:255'],
            'street_address_1' => ['required','string', 'max:255'],
            'street_address_2'=>['nullable','string', 'max:255'],
            'zip_code'=>['required', 'string', 'min:6', 'max:6'],
            'city'=>['required','string', 'max:255'],
            'phone' => ['required','min:9','max:9', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'firstname'=>$request->firstname,
            'surname'=>$request->surname,
            'phone'=>$request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::where('name','User')->get()->first()->id
        ]);


        $address=new Address();

        event(new Registered($user));

        Auth::login($user);
        $address->user_id=$user->id;
        $address->street_address_1=$request->street_address_1;
        $address->street_address_2=$request->street_address_2;
        $address->zip_code=$request->zip_code;
        $address->city=$request->city;
        $address->save();

        $cart=new Cart();
        $cart->user_id=$user->id;
        $cart->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
