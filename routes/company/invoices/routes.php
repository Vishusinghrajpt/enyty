<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\InvoicesController;




    Route::group(['controller' => InvoicesController::class],function(){
        Route::get('/invoices','invoices')->name('invoices');
        // Route::get('/invoiceDownload/{donationId}','invoiceDownload')->name('invoiceDownload');
    });
