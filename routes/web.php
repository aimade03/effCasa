<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoitureController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('voitures', VoitureController::class);
