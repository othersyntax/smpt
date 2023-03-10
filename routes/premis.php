<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Premis\PenyewaanController;
use App\Http\Controllers\Premis\BayaranController;
use App\Http\Controllers\PremisController;

Route::prefix('/premis')->group(function(){
    Route::get('/senarai', [PenyewaanController::class, 'senarai'])->name('premis-senarai')->middleware('isLoggedIn');
    Route::get('/view/{tanah}',[PenyewaanController::class, 'papar'])->middleware('isLoggedIn');;
    Route::get('/sewa/{sewaan}',[PenyewaanController::class, 'sewa'])->middleware('isLoggedIn');;
});

