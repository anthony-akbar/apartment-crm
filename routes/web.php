<?php

use App\Http\Controllers\ApartmentsController;
use App\Http\Controllers\DairyController;
use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::group(['prefix'=>'dairy'], function (){
    Route::get('/', [DairyController::class, 'index'])->name('dairy');
    Route::post('/store', [DairyController::class, 'store'])->name('dairy.store');
    Route::post('/delete/{id}', [DairyController::class, 'delete'])->name('dairy.delete');
});

Route::group(['prefix'=>'apartments'], function (){
    Route::get('/', [ApartmentsController::class, 'index'])->name('apartments');
    Route::get('/search', [ApartmentsController::class, 'search'])->name('apartments.search');
});

Route::group(['prefix'=>'parkings'], function () {
    Route::get('/',[ParkingController::class, 'index'])->name('parking');
});

Route::group(['prefix'=>'clients'], function (){
Route::get('/', [\App\Http\Controllers\ClientController::class, 'index'])->name('clients');
});
Route::controller(DairyController::class)->group(function(){
    Route::get('dairies-export', 'export')->name('dairies.export');
    Route::get('/search', [DairyController::class, 'search'])->name('dairy.search');
});




Route::group(['prefix'=>'test'], function (){
    Route::get('/', function (){
        dd(strtotime('19 May, 2023 - 19 Jun, 2023'));
        dd(date("Y-m-d",));
    });
    Route::group(['prefix'=>'{block}'], function (){
        Route::group(['prefix'=>'{kv}'], function () {
            Route::get('/', function ($block, $kv){
            dump($block);
            dd($kv);
            });
        });
    });
});
