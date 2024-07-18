<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CreatPosterController;




    Route::group(['controller' => CreatPosterController::class],function(){
        Route::get('/create-poster','steps')->name('step_1');
        Route::get('/create-poster/{slug}','step_4')->name('step_4');
        Route::post('/create-enyty-page','create_enyty_page')->name('create_enyty_page');
        Route::post('/create','store')->name('create_poster');
        Route::get('/download-qrcode/{pageName}', 'downloadQRCode')->name('qrcodeDownload');

    });
