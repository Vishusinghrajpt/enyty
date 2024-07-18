<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayPalPaymentControll;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Company\ProfileController as company_profile;
use Illuminate\View\View;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;



Route::post('commemoration/{profile}/like', [LikeController::class, 'store'])->name('profiles.like');
Route::post('commemoration/{profile}/comment', [CommentController::class, 'store'])->name('profiles.comment');

Route::group(['controller' => FrontendController::class],function(){
    Route::get('/','index')->name('index');
    Route::get('/commemoration','commemoration')->name('commemoration');
    // 
    Route::get('/searcharea','searcharea')->name('searcharea');
    Route::get('/commemorations','commemorations')->name('commemorations');
    // 
    Route::get('/events','events')->name('events');
    Route::get('/getLoctions','getLoctions')->name('getLoctions');
    Route::get('/mission','mission')->name('mission');
    Route::get('/donations','donations')->name('donations');
    Route::post('/events','loadMore')->name('loadMore');
    Route::post('/search-events','liveSearch')->name('liveSearch');
    Route::post('/tribut-events','like')->name('like');
    Route::get('/register','register')->name('register');
    Route::post('/invite-email','InviteEmail')->name('InviteEmail');
    Route::post('/register','register_store')->name('register_store');
    Route::get('verify/{status}/{token}', 'verify')->name('verify');
    Route::post('verify', 'postverify')->name('postverify');
    Route::get('commemoration/{slug}', 'commemorationInnerpage')->name('commemorationInnerpage');
    Route::post('commemoration/leave-tribut', 'leaveTribut')->name('leave-tribut');
    Route::post('commemoration/pagination', 'pagination')->name('pagination');
    Route::post('commemoration/deleteTribut', 'deleteTribut')->name('deleteTribut');
    Route::get('/agency-login','agencylogin')->name('agencylogin');
    Route::post('/agency-login' ,'Agency_login')->name('Agency_Login');

// new route agency start
    Route::get('/company-register' , 'agency')->name('agency');
// new route agency end

});


Route::group(['controller' => UserController::class,'middleware'=>'auth'],function(){
    Route::get('/profile','profile')->name('user_profile');
    Route::get('/passward','passward')->name('passward');
    // 
    Route::get('/create-enyty-page','create_enyty_page')->name('create_enyty_page');
    // 
    Route::post('/delete-eternity-page','delete_eternity_page')->name('delete_eternity_page');
    Route::get('/donation-history','donation_history')->name('donation_history');
    Route::get('/payment-method','payment_method')->name('payment_method');
    // 
    Route::get('/your-enyty-page','your_enyty_page')->name('your_enyty_page');
    // 
    Route::post('/update-eternity-page','update_eternity_page')->name('update_eternity_page');
    Route::post('/profile-image-update','profile_image_update')->name('profile_image_update');
    Route::post('/profile-update','profile_update')->name('profile_update');
    Route::post('/password-update','password_update')->name('password_update');
    Route::post('/create-eternity-page_','create_eternity_page_')->name('create_eternity_page_');
    Route::get('/deletCard','deletCard')->name('deletCard');
    
});

Route::group(['controller' => PayPalPaymentControll::class,'middleware'=>'auth'],function(){
    Route::get('/handle-payment','handlePayment')->name('payment');
    Route::get('cancel-payment/{routename}', 'paymentCancel')->name('cancel.payment');
    Route::get('payment-success/{routename}/{amount}', 'paymentSuccess')->name('success.payment');
    Route::get('/paypal', 'index')->name('paypal');
  
});

Route::group(['controller' => PaymentController::class],function(){
    Route::post('/stripe','stripe')->name('stripe');
            
});

Route::group(['controller' => WalletController::class,'middleware'=>'auth'],function(){
    Route::post('/wallet','wallet')->name('wallet');
});

Route::group(['controller' => SubscriptionController::class,'middleware'=>'auth'],function(){
    Route::post('/subscribe','subscribe')->name('subscribe');
});
Route::get('/unsubscribe/{token}',[SubscriptionController::class,'unsubscribe'])->name('unsubscribe');


// Company\ProfileController as company_profile




Route::View('/register-new', 'auth/register_new')->name('register_new');
Route::view('/login-new', 'auth/login_new')->name('login_new');
Route::view('test' , 'auth/test')->name('test');



require __DIR__.'/auth.php';




