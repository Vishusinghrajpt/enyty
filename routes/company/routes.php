<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::name('company.')->group(function ($router) {
    Route::group(['middleware' => ['auth','company']], function ($router) {
        
        // company
        require base_path('routes/company/profile/routes.php');
        // poster 
        require base_path('routes/company/poster/routes.php');

        // Client 
        require base_path('routes/company/clients/routes.php');

        // invoices 
        require base_path('routes/company/invoices/routes.php');
    });
});