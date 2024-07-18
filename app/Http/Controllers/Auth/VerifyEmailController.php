<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agencie;
use Auth;

class VerifyEmailController extends Controller
{
    public function index(Request $request)
    {
        $user = User::findOrFail($request->id);
        if (! hash_equals((string) $request->hash, sha1($user->getEmailForVerification()))) {
                abort(419);
        }else{
            $dd = User::where('id', $request->id)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            if($dd){
                if(User::find($request->id)->role_id ==2){
                    Auth::loginUsingId($user->id, true);
                    return redirect()->route('user_profile');
                }else{
                    Auth::loginUsingId($user->id, true);
                    return redirect()->route('company.company_profile');
                }
            }
           abort(419);
        }
    }// end method
    
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        
        //  Not Using 
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
            
          // Mark the user's email as verified
        if ($request->user()->markEmailAsVerified()) {

            // Create Agencie record
            $agencie = new Agencie();
            $agencie->user_id = $request->user()->id;
            $agencie->c_email = $request->user()->c_email;

            // Set other attributes as needed
            $agencie->save();

            // Trigger the "Verified" event
            event(new Verified($request->user()));

        }
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}// end class