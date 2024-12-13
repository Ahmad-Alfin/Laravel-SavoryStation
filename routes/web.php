<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
Route::get('/', function () {
    return view('welcome');
    
});

Route::resource('menus', MenuController::class);
Route::get('menus-report', [MenuController::class, 'exportPdf'])->name('menus.report');

