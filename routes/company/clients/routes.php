<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\ClientsController;




    Route::group(['controller' => ClientsController::class],function(){
        Route::get('/clients','clients')->name('clients');
        Route::get('/fetch_user_data','fetch_user_data')->name('fetch_user_data');
        
    });
