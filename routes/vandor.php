<?php


Auth::routes();

Route::get('/login/vandor', [\App\Http\Controllers\Auth\LoginController::class, 'showVandorLoginForm']);
Route::get('/register/vandor', [\App\Http\Controllers\Auth\LoginController::class, 'showVandorRegisterForm'])->name('showVandorRegisterForm');
Route::post('/register/vandor/post', [\App\Http\Controllers\Auth\LoginController::class, 'StoreVandorRegisterForm'])->name('StoreVandorRegisterForm');
Route::post('/login/vandor', [\App\Http\Controllers\Auth\LoginController::class,'VandorLogin']);


Route::group(['middleware' => 'auth:vandor'], function () {

    Route::get('/Vandor/vandor-dashboard', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorDashobard'])->name('VandorDashobard');

    //---------------------------------Vandor Profile ---------------------------
    Route::get('/Vandor/vandor-account-setting/{id}', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorProfile'])->name('VandorProfile');
    Route::post('/Vandor/vandor-account-update', [\App\Http\Controllers\Vandor\VandorDashboardController::class,'VandorProfileUpdate'])->name('VandorProfileUpdate');


});





?>