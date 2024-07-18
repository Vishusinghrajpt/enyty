<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Agencie;




class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }// end method

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'/*, 'confirmed', Rules\Password::defaults()*/],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' =>2,
            'password' => Hash::make($request->password),
        ]);

      
        $agency = Agencie::create([
            'email' => $request->email,
            'role_id' =>3,
            'password' => Hash::make($request->password),
        ]);

 // new table agency end 

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }// end method
}// end class