<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\ProfileController;




    Route::group(['controller' => ProfileController::class],function(){
        Route::get('/profile','index')->name('company_profile');
        Route::post('/profile','update')->name('c_p_update');
        Route::get('/password','company_password')->name('company_password');
    });
