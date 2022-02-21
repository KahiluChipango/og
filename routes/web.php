<?php

use Illuminate\Support\Facades\Route;
use SuperAdmin\UserController;
use App\Http\Controllers\FrontDeskController;
//use AgentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});




/*Route::middleware('auth')->group(function(){
   Route::prefix('super-admin')->middleware('auth.isSuperAdmin')->name('super-admin.')->group(function (){
       Route::resource('/users', UserController::class);

   });



});*/

/* Super Admin Routes */
    Route::prefix('super-admin')->middleware(['auth', 'auth.isSuperAdmin'])->name('super-admin.')->group(function (){
        Route::resource('/users', UserController::class);


    });

///*Front Desk Route*/
//    Route::prefix('front-desk')->middleware(['auth', 'auth.isFrontDesk'])->name('front-desk.')->group(function (){
//        Route::resource('/front-desk', FrontDeskController::class);
//
//
//    });*/
//Route::middleware('auth')->middleware('auth.isAdmin')->group(function (){
///* Admin Routes */
//    Route::prefix('admin')->name('admin.')->group(function (){
//        Route::resource('/admin', AdminController::class);
//
//
//    });
//});
//
//Route::middleware('auth')->middleware('auth.isFrontDesk')->group(function (){
//    /* Front Desk Routes */
//    Route::prefix('front-desk')->name('front-desk.')->group(function (){
//        Route::resource('/front-desk'/*, FrontDeskController::class*/);
//
//
//    });
//});
//
//Route::middleware('auth')->middleware('auth.isAccounts')->group(function (){
//    /* Accounts Routes */
//    Route::prefix('accounts')->name('accounts.')->group(function (){
//        Route::resource('/accounts'/*, AccountsController::class*/);
//
//
//    });
//});
//
//Route::middleware('auth')->middleware('auth.isAgents')->group(function (){
//    /* Agents Routes */
//    Route::prefix('agents')->name('agents.')->group(function (){
//        Route::resource('/agents'/*, AgentsController::class*/);
//
//
//    });
//});
//
