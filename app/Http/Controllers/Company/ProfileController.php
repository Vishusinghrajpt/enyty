<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller
{
    public function index(Request $request) 
    { 
        $user = auth()->user();
        $countries =  Country::all();
        $states = $user->country ? $user->country->states : null;
        $cities = $user->state ? $user->state->cities : null;
        return view('company.profile',compact('user','countries','states','cities'));
    }

    public function update(Request $request) 
    { 
            $user = auth()->user();
            $user->update([
                'email' => $request->email,
                'name' =>$request->name,
                'state_id' => $request->province_id ?? null,
                'country_id'=>$request->country_id ?? null,
                'city_id' => $request->city_id ?? null,
            ]);
            if($user){
                $user->agencie()->update([
                    'user_id' => auth()->user()->id,
                    'number' => $request->t_number,
                    'vat_number' => $request->vat_number,
                ]);
            }
        return $user;
    }



    public function company_password(Request $request) 
    { 
        return view('company.password');
    }

    
}