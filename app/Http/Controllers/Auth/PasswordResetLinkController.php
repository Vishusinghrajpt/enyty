<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
   
    public function create(): View
    {
        return view('auth.forgot-password');
    } // end method

    
    public function store(Request $request)
    {
     $is_exists = User::where('email',$request->email)->exists();
    
        if(!$is_exists){
           $return_status= "false";
        }else{
  
      $request->validate([
            'email' => ['required', 'email'],
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );
          $return_status ="true";
        }
        return $return_status;
    }// end method
    
}// end class
