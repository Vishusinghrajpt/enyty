<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class BackendController extends Controller
{
    function index(){
        if(Auth::user()->role_id==1){
         return redirect()->route('admin.dashboard');
        }else{
            return view('dashboard');
        }
    }// end method
    
    
}