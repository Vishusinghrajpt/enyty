<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Events\Auth\UserLoginSuccess;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        return view('auth.login');
    }// end method

    public function agencyStore(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->role_id == 3) {
            // Valid user with role_id == 3
            $remember = true;
            if ($this->userLogin($request, $request->email, $request->password, $remember)) {
                return redirect()->route('company.company_profile');
            }else {
                // Failed login attempt
                return back()->withErrors([
                    'invalid_credentials' => 'Invalid Credentials',
                ])->onlyInput('email');
            }
        }
    
        // Invalid credentials or role_id != 3
        return back()->withErrors([
            'invalid_credentials' => 'Invalid Credentials',
        ])->onlyInput('email');
    }
    
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->role_id == 2) {
            $remember = true;
            if ($this->userLogin($request, $request->email, $request->password, $remember)) {
                return redirect()->route('user_profile');
            }else {
                // Failed login attempt
                return back()->withErrors([
                    'invalid_credentials' => 'Invalid Credentials',
                ])->onlyInput('email');
            }
        }
    
        // Invalid credentials or role_id != 2
        return back()->withErrors([
            'invalid_credentials' => 'Invalid Credentials',
        ])->onlyInput('email');
    }
    
    public function userLogin($request, $email, $password, $remember)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            $session_data = $request->session()->all();
    
            if (array_key_exists('url', $session_data)) {
                event(new UserLoginSuccess($request, auth()->user()));
                Auth::logoutOtherDevices($request->password);
                return true;
            } else {
                // Handle regular login
                $is_verified = $request->user()->hasVerifiedEmail();
    
                if ($is_verified) {
                    // Verified email
                    event(new UserLoginSuccess($request, auth()->user()));
                    Auth::logoutOtherDevices($request->password);
                    return true;
                } else {
                    // Unverified email
                    $request->user()->sendEmailVerificationNotification();
                    Auth::guard('web')->logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return back()->withErrors([
                        'email' => 'Email not verified',
                        'status' => 'A new email verification link is sent to your email',
                    ])->onlyInput('email');
                }
            }
        }

        return false;
    }

    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }// end method
}// end class