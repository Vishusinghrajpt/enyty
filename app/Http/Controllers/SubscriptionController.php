<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Subscriber;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
         $validator = validator($request->all(), [
          'email' => 'required|email|unique:subscribers',
            ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        Subscriber::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['email' => $request->email,'name' => Auth::user()->name,'unsubscribe_token' => Str::random(30)]
        );
        
        // send email of successfully subscription
        $user=new User();
        $user->email=$request->email;
        $name=Auth::user()->name;
        Mail::to($user->email)->send(new \App\Mail\Newsletter($name));
    
        return response()->json(['message' => 'Subscription successful!'], Response::HTTP_OK);
        
    }// end method
    
    public function unsubscribe($token){
        $subscriber = Subscriber::where('unsubscribe_token', $token)->first();

        if ($subscriber) {
            // Unsubscribe logic
            $subscriber->delete();
            return response()->json(['message' => 'Unsubscribed successfully']);
        }

        return response()->json(['error' => 'Invalid unsubscribe token'], 404);
   
    }
    
}
