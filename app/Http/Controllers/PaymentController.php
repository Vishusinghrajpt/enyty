<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Cashier;
use Stripe;
use Session;
use Stripe\Webhook;
use App\Models\DonationHistories;
use App\Models\CardDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 
class PaymentController extends Controller
{
    
    
    public function stripe(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->server('HTTP_STRIPE_SIGNATURE');
        $secret ='whsec_YhwVPbM16fOxk5q6KG6DU6n4W7xnpjhR'; 

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $secret);
        } catch (SignatureVerificationException $e) {
            return response('Invalid webhook signature', 400);
        }
         
         
        switch ($event->type) {
            case 'checkout.session.completed':
               $this->storePaymentDetails($event);
                break;
            default:
                break;
        }
    
    }
    
    public function storePaymentDetails($event)
    {
        $e = $event->data->object;
        
    
       $eventId =$event->id;
       $amount = $e->amount_total;
       $email = $e->customer_details->email;
       $name = $e->customer_details->name;
       $payment_intent = $e->payment_intent;
       $customerId =$e->customer;
       $payment_link = $e->payment_link;
       $status =$e->status;
       $user = User::where('email',$email)->first();
       $don ='';
       
       if($amount){
           $amount = $amount / 100;
       }
       
        if($user){
          $don =  $user->donationHistories()->create([
                  'donationId'=> $customerId,
                  'status'=>$status,
                  'emailAddress'=>$email,
                  'paymentMethod'=>'Card',
                  'paymentDetails'=>json_encode($e),
                  'fullName'=>$name,
                  'amount'=>$amount,
                  'currency'=>$e->currency
              ]);
          }else{
            $don =  DonationHistories::create([
                  'donationId'=> $customerId,
                  'status'=>$status,
                  'emailAddress'=>$email,
                  'paymentMethod'=>'Card',
                  'paymentDetails'=>json_encode($e),
                  'fullName'=>$name,
                  'amount'=>$amount,
                  'currency'=>$e->currency
              ]);
          }
        
        print_r($status);
    }

   
    
} // end class
